<?php
if (!isset($in['idx']) || !$in['idx']) {
	msg("잘못된 접근입니다.", -1);
}

$board = new Board();
$data = $board->get($in['idx']);
if (!$data) {
	msg("존재하지 않는 게시글입니다.", -1);
}

view("view", $data);