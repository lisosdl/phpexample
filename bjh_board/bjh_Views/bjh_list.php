<?php
// board객체 생성
$board = new bjh_Board();
$id = "";
// id값이 존재할경우
if (preg_match("/&id/", $_SERVER['REQUEST_URI'])) {
	$data = explode("=", $_SERVER['REQUEST_URI']);
	foreach ($data as $v) {
		if (is_numeric($v)) {
			$id = $v;
		}
	}
	$result = $board->select($id);
	$date = explode(" ", $result['regDt']);
	$date = explode("-", $date[0]);
} else { // 아이디 값이 존재하지 않을 경우
	$result = $board->boardList();
}
?>

<!-- 현재 url에 id값이 존재하면 출력X -->
<?php if (!preg_match("/id/", $_SERVER['REQUEST_URI'])) : ?>
<!-- 모든 board 데이터를 출력 -->
<?php foreach ($result as $value) : ?>
<!-- 등록일자를 년, 월, 일 단위로 explode -->
<?php
$date = explode(" ", $value['regDt']);
$date = explode("-", $date[0]);
?>
<ul>
	<li>
		<a href='?dir=board&file=list&id=<?=$value['id']?>'><?=$value['subject'] ?></a>
		<?=$value['poster'] ?> / <?=$date[0]?>년 <?=$date[1]?>월 <?=$date[2]?>일
	</li>
</ul>
<? endforeach; ?>
<? endif; ?>

<!-- 현재 url에 id값이 존재할경우 출력 -->
<?php if (preg_match("/id/", $_SERVER['REQUEST_URI'])) : ?>
<dl>
	<dt>제목</dt>
	<dd><?=$result['subject']?></dd>
</dl>
<dl>
	<dt>글쓴이</dt>
	<dd><?=$result['poster']?></dd>
</dl>
<dl>
	<dt>등록일자</dt>
	<dd><?=$date[0]?>년 <?=$date[1]?>월 <?=$date[2]?>일</dd>
</dl>
<dl>
	<dt>내용</dt>
	<dd><?=$result['content']?></dd>
</dl>
<? endif; ?>

<!-- 상시출력 -->
<a href='?dir=board&file=write'>글작성</a>
<!-- 현재 url에 id값이 존재할경우 출력 -->
<?php if (preg_match("/&id/", $_SERVER['REQUEST_URI'])) : ?>
<a href='?dir=board&file=update&id=<?=$id?>'>글수정</a>
<a href='?dir=board&file=indb&id=delete'>글삭제</a>
<? endif; ?>