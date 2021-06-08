<?php
$board = new bjh_Board();
$action = 0;
$data = $_SERVER['REQUEST_URI'];
$id = "";
$result = "";
if (preg_match("/id/", $data)) {
	$action = 1;
	$data = explode("=", $data);
	foreach ($data as $v) {
		if (is_numeric($v)) {
			$id = $v;
		}
	}
	$result = $board->select($id);
}
?>
<form method='post' action='?dir=board&file=indb' autocomplete='off'>
	<dl>
		<dt>제목</dt>
		<dd>
			<input type='text' name='subject' value='<?=$action = $action ? $result['subject'] : ""?>'>
		</dd>
	</dl>
	<dl>
		<dt>글쓴이</dt>
		<dd>
			<input type='text' name='poster' value='<?=$action = $action ? $result['poster'] : ""?>'>
		</dd>
	</dl>
	<dl>
		<dt>내용</dt>
		<dd>
			<textarea name='content'><?=$action = $action ? $result['content'] : ""?></textarea>
		</dd>
	</dl>
	<input type='submit' value='<?=$action = $action ? "수정" : "작성"?>완료'>
</form>