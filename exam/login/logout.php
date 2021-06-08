<?php
include "common.php";
if (!isLogin()) {
	msg("접근 불가 페이지!");
}
session_destroy();
go("index.php");