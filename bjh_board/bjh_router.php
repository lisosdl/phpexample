<?php
/**
* 주소창 경로지정
* 1. bjh_Controller경로에서 -> ?dir=폴더명 -> &file=파일명
*/
$bjh_GET = $_GET ? $_GET : [];
$bjh_POST = $_POST ? $_POST : [];

array_merge($bjh_GET, $bjh_POST);

$bjh_GET['dir'] = $_GET['dir'] ?? "board";
$bjh_GET['file'] = $_GET['file'] ?? "list";

include_once "bjh_Controller/bjh_".$bjh_GET['dir']."/bjh_".$bjh_GET['file']."Controller.php";