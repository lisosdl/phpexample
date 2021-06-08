<?php
include "bjh_login_session.php";
if (!Login()) {
	msg("접근 불가 페이지!");
}
session_destroy();
nextUrl("bjh_index.php");