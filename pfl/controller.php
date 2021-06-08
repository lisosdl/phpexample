<?php
/**
* 1. $_GET -> true = $_GET OR false = []
* 2. $_POST -> true = $_POST OR false = []
*/
$urlGet = $_GET ?? [];
$urlPost = $_POST ?? [];

// _GET, _POST 배열을 합침
array_merge($urlGet, $urlPost);


// $_GET['000'] -> true = $_GET['000'] OR false = ""
$urlGet['mode'] = $_GET['mode'] ?? "Front";
$urlGet['dir'] = $_GET['dir'] ?? "Member";
$urlGet['file'] = $_GET['file'] ?? "login";

// mode, dir, file의 값을 받아서 경로 지정
$url = $urlGet['mode'] . "/" . $urlGet['dir'] . "/" . $urlGet['file'];

$mode = explode("/", $url);

if (nonePage($mode, "Controller")) { // 페이지가 존재할경우
	// Controller폴더의 해당되는 경로의 파일명Controller.php를 한번만 불러옴
	include_once "Controller/" . $url . "Controller.php";
} else { // 페이지가 없을경우 404에러페이지
	// 404에러페이지 출력
	include_once "Controller/Exception/errorController.php";
}