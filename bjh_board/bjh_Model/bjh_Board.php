<?php
/**
* 유효성 검사
* 접근성 검사
* database qurey문 작성
*/
class bjh_Board
{
	public function __construct()
	{
		global $bjh_db;
		
		$this->db = $bjh_db;
	}
	/**
	* 게시글 쓰기 처리함수
	*
	*/
	public function write()
	{
		$sql = "INSERT INTO bjh_board (subject, poster, content) VALUES (:subject, :poster, :content)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":subject", $_POST['subject']);
		$stmt->bindValue(":poster", $_POST['poster']);
		$stmt->bindValue(":content", $_POST['content']);
		$stmt->execute();
	}
	
	/**
	* 게시글 읽기 처리함수
	*
	*/
	public function boardList()
	{
		$sql = "SELECT * FROM bjh_board";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = [];
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}
	
	/**
	* 게시글 수정 처리 함수
	*
	*/
	public function update($id)
	{
		$sql = "UPDATE bjh_board SET subject = :subject, poster = :poster, content = :content WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		$stmt->bindValue(":subject", $_POST["subject"]);
		$stmt->bindValue(":poster", $_POST["poster"]);
		$stmt->bindValue(":content", $_POST["content"]);
		$stmt->execute();
	}
	
	/**
	* 선택된 게시글 출력
	*
	*/
	public function select($id)
	{
		$sql = "SELECT * FROM bjh_board WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		$result = "";
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result = $row;
		}
		return $result;
	}
	
	/**
	* 게시글 삭제 처리 함수
	*
	*/
	public function delete($id)
	{
		$sql = "DELETE FROM bjh_board WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
	}
}