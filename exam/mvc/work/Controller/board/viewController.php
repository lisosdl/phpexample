<?php
if (!isset($in['idx']) || !$in['idx']) {
	msg("잘못된 접근입니다.", -1);
}
$board = new Board();
$data = $board->get($in['idx']);
view("view", $data);