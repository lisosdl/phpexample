<?php
/**
* 게시판 Model 
*
*/
class Board 
{
	private $db; // DB 인스턴스
	private $params = []; // 처리할 데이터 
	
	public function __construct()
	{
		global $db;
		
		$this->db = $db;
	}
	
	// 처리할 데이터 설정 
	public function data($params = [])
	{
		$this->params = $params;
		return $this;
	}
	
	// 유효성 검사
	public function validator($mode = "write")
	{
		$required = [
			'poster' => '글쓴이를 입력하세요.',
			'subject' => '제목을 입력하세요.',
			'contents' => '내용을 입력하세요',
		];
		
		if ($mode == 'update') {
			$required['idx'] = "잘못된 접근입니다.";
		}
		
		foreach ($required as $col => $msg) {
			if (!isset($this->params[$col]) || !$this->params[$col]) {
				throw new Exception($msg);
			}
		}
		
		return $this;
	}
	
	// 게시글 작성
	public function write()
	{
		$sql = "INSERT INTO board (poster, subject, contents) 
						VALUES (:poster, :subject, :contents)";
		$stmt = $this->db->prepare($sql); // 준비 
		// 바인딩 
		$stmt->bindValue(":poster", $this->params['poster'], PDO::PARAM_STR);
		$stmt->bindValue(":subject", $this->params['subject'], PDO::PARAM_STR);
		$stmt->bindValue(":contents", $this->params['contents'], PDO::PARAM_STR);
		
		// 실행
		// 실패시 -> false 
		$result = $stmt->execute();
		if (!$result) {
			return false;
		}
		
		// 성공시 게시글 작성 번호(idx)
		$idx = $this->db->lastInsertId();
		
		return $idx;
	}
	
	// 게시글 수정 
	public function update()
	{
		$sql = "UPDATE board 
						SET 
							poster = :poster,
							subject = :subject,
							contents = :contents,
							modDt = :modDt
					WHERE 
							idx = :idx";
		$stmt = $this->db->prepare($sql); // 준비
		// 바인딩 
		$stmt->bindValue(":poster", $this->params['poster'], PDO::PARAM_STR);
		$stmt->bindValue(":subject", $this->params['subject'], PDO::PARAM_STR);
		$stmt->bindValue(":contents", $this->params['contents'], PDO::PARAM_STR);
		$stmt->bindValue(":modDt", date("Y-m-d H:i:s"), PDO::PARAM_STR);
		$stmt->bindValue(":idx", $this->params['idx'], PDO::PARAM_INT);
		
		// 실행
		$result = $stmt->execute();
		
		return $result;
	}
	
	// 게시글 삭제 
	public function delete($idx)
	{
		$sql = "DELETE FROM board WHERE idx = :idx";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":idx", $idx, PDO::PARAM_INT);
		
		$result = $stmt->execute();
		return $result;
	}
	
	// 게시글 조회 
	public function get($idx) 
	{
		$sql = "SELECT * FROM board WHERE idx = :idx";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":idx", $idx, PDO::PARAM_INT);
		$result = $stmt->execute();
		if (!$result) return [];
		
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $data;
	}
	
	// 게시글 목록 조회
	public function getList()
	{
		$sql = "SELECT * FROM board ORDER BY regDt DESC";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$list = [];
		if ($result) {
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$list[] = $row;
			}
		}
		
		return $list;
	}
}