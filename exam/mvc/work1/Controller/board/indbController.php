<?php
$board = new Board();
try {
	switch($in['mode']) {
		// 게시글 작성 
		case "write" :
			$idx = $board->data($in)
							->validator()
							->write();
							
			if ($idx === false) {
				throw new Exception("게시글 작성 실패!");
			}
			
			go("?dir=board&file=view&idx={$idx}", "parent");
			break;
		// 글 수정
		case "update" :
			$result = $board->data($in)
								  ->validator("update")
								  ->update();
			if (!$result) {
				throw new Exception("게시글 수정 실패!");
			}
			
			// 성공시 -> 게시글 보기
			
			go("?dir=board&file=view&idx={$in['idx']}", "parent");
			break;
		// 게시글 삭제 
		case "delete" : 
			if (!isset($in['idx']) || !$in['idx']) {
				throw new Exception("잘못된 접근입니다.");
			}
			
			$result = $board->delete($in['idx']);
			if (!$result) {
				throw new Exception("삭제실패!");
			}
			
			// 성공시 -> 게시글 목록
			go("?dir=board&file=list", "parent");
			break;
	}
} catch (Exception $e) {
	msg($e->getMessage());
}