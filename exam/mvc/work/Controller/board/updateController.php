<?php
if (!isset($in['idx']) && !$in['idx']) {
	msg("잘못된 접근입니다.", -1);
}

$board = new Board();
$data = $board->get($in['idx']);
if (!$data) {
	msg("게시글이 존재하지 않습니다.", -1);
}

view("form", $data);