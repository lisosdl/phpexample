<?php
/** Core 폴더 안의 모든 파일을 추가 */
foreach (glob("Core/*") as $file) {
	include_once $file;
}

/** Model 폴더 안의 모든 파일을 추가 */
foreach (glob("Model/*") as $file) {
	include_once $file;
}


// DB 객체 생성
$db = new DB();
