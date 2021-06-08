<?php
/**
라우팅 
$_GET['folder'] - Controller 폴더 안에 폴더명
$_GET['file']  - Controller/폴더/파일Controller.php
Controller 연결
*/

$_GET = $_GET ?? [];
$_POST = $_POST ?? [];

$in = array_merge($_GET, $_POST);

$_GET['folder'] = $_GET['folder'] ?? "board";
$_GET['file'] = $_GET['file'] ?? "list";

include_once "Controller/".$_GET['folder']."/".$_GET['file']."Controller.php";