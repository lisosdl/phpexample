<?php
// Core 폴더 내의 모든파일을 순회
foreach (glob("Core/*") as $file) {
	// 순회한 파일을 한번씩만 가져옴
	include_once $file;
}
// Model 폴더 내의 모든파일을 순회
foreach (glob("Models/*") as $file) {
	// 순회한 파일을 한번씩만 가져옴
	include_once $file;
}

$db = new DB();