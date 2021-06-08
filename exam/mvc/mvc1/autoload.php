<?php
// Core
foreach (glob("Core/*") as $file) {
	include_once $file;
}

// Model
foreach (glob("Model/*") as $file) {
	include_once $file;
}

// DB 객체
$db = new DB();