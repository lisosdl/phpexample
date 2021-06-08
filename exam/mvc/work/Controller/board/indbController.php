<?php
/**
* 게시판 DB 처리 
*
*/
try {
	$board = new Board();
	switch ($in['mode']) {
		/** 게시글 작성 */
		case "write" :
			$idx = $board->data($in)
								 ->validator()
								 ->write();
			
			if ($idx === false) {
				throw new Exception("게시글 등록 실패!");
			}
			
			// 성공
			go("?folder=board&file=view&idx=".$idx, "parent");
			break;
		/** 게시글 수정 */
		case "update" : 
			$result = $board->data($in)
								 ->validator("update")
								 ->update();
			
			if (!$result) { // 게시글 수정 실패
				throw new Exception("게시글 수정 실패!");
			}
			
			// 성공
			go("?folder=board&file=view&idx=".$in['idx'], "parent");
			break;
		/** 게시글 삭제 */
		case "delete" : 
			if (!isset($in['idx']) || !$in['idx']) {
				throw new Exception("잘못된 접근입니다.");
			}
			
			$result = $board->delete($in['idx']);
			if (!$result) { // 삭제 실패
				throw new Exception("삭제실패!");
			}
			
			// 성공 - 게시글 목록 
			go("?folder=board&file=list", "parent");
			break;
	} 
} catch (Exception $e) {
	msg($e->getMessage());
}