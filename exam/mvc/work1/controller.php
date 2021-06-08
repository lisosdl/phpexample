<?php
/**
 $_GET['dir'] -> Controller 하위 폴더명
 $_GET['file'] -> Controller 하위 폴더명 하위의 파일Controller.php
*/

$_GET = $_GET ?? [];
$_POST = $_POST ?? [];
$in = array_merge($_GET, $_POST);

$_GET['dir'] = $_GET['dir'] ?? "board";
$_GET['file'] = $_GET['file'] ?? "list";

include_once "Controller/".$_GET['dir']."/".$_GET['file']."Controller.php";