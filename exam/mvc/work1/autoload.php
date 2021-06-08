<?php
/** Core 자동 추가 */
foreach(glob("Core/*") as $file) {
	include_once $file;
}

/** Model 자동 추가 */
foreach(glob("Model/*") as $file) {
	include_once $file;
}

/* DB 연결 */
$db = new DB();