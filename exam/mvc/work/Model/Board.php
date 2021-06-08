<?php
/**
* 게시판 Model
*
*/
class Board 
{
	private $db;  // DB 인스턴스 
	private $params = []; // 처리할 데이터 
	
	public function __construct()
	{
		global $db;
		
		$this->db = $db;
	}
	
	/** 처리할 데이터 설정 */
	public function data($params = [])
	{
		$this->params = $params;
		return $this;
	}
	
	/** 게시판 유효성 검사 */
	public function validator($mode = "write")
	{
		if ($mode == 'update' && !$this->params['idx']) {
			throw new Exception("잘못된 접근입니다.");
		}
		
		if (!$this->params['poster']) {
			throw new Exception("글쓴이를 입력해 주세요.");
		}
		
		if (!$this->params['subject']) {
			throw new Exception("제목을 입력해 주세요.");
		}
		
		if (!$this->params['contents']) {
			throw new Exception("내용을 입력해 주세요.");
		}
		
		return $this;
	}
	
	/** 게시글 작성 */
	public function write()
	{
		$sql = "INSERT INTO board (poster, subject, contents)
						VALUES (:poster, :subject, :contents)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":poster", $this->params['poster'], PDO::PARAM_STR);
		$stmt->bindValue(":subject", $this->params['subject'], PDO::PARAM_STR);
		$stmt->bindValue(":contents", $this->params['contents'], PDO::PARAM_STR);
		$result = $stmt->execute();
		if ($result) {
			// 작성 완료 되면 게시글 번호 idx 
			$idx = $this->db->lastInsertId(); 
			return $idx;
		}
		
		return false;
	}
	
	/** 게시글 수정 */
	public function update()
	{
		$sql = "UPDATE board 
						SET 
							poster = :poster,
							subject = :subject,
							contents = :contents
					WHERE 
							idx = :idx";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":poster", $this->params['poster'], PDO::PARAM_STR);
		$stmt->bindValue(":subject", $this->params['subject'], PDO::PARAM_STR);
		$stmt->bindValue(":contents", $this->params['contents'], PDO::PARAM_STR);
		$stmt->bindValue(":idx", $this->params['idx'], PDO::PARAM_INT);
		$result = $stmt->execute();
		
		return $result;
	}
	
	/** 게시글 삭제 */
	public function delete($idx)
	{
		$sql = "DELETE FROM board WHERE idx = :idx";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":idx", $idx);
		$result = $stmt->execute();
		
		return $result;
	}
	
	/** 게시글 조회 */
	public function get($idx)
	{
		$sql = "SELECT * FROM board WHERE idx = :idx";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":idx", $idx, PDO::PARAM_INT);
		$result = $stmt->execute();
		if (!$result) {
			return [];
		}
		
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $data;
	}
	
	/** 게시글 목록 */
	public function getList()
	{
		$sql = "SELECT * FROM board ORDER BY regDt DESC";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$list = [];
		if ($result) {
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$list[] = $row;
			}
		}
		
		return $list;
	}
}