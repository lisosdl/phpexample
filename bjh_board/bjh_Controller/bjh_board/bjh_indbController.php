<?php

try {
	// Board 객체 생성
	$board = new bjh_Board();
	$refererUrl = $_SERVER['HTTP_REFERER'];
	$id = "";

	if (preg_match("/write/", $refererUrl)) { // 글 작성
		$board->write();
	} else if (preg_match("/update/", $refererUrl)) { // 글 수정
		$data = explode("=", $refererUrl);
		foreach ($data as $v) {
			if (is_numeric($v)) {
				$id = $v;
			}
		}
		$board->update($id);
	} else if (preg_match("/delete/", $_SERVER['REQUEST_URI'])) { // 글 삭제
		$data = explode("=", $refererUrl);
		foreach ($data as $v) {
			if (is_numeric($v)) {
				$id = $v;
			}
		}
		$board->delete($id);
	}
} catch (Exception $e) {
	echo $e->getMessage();
}

nextUrl('/bjh_board');