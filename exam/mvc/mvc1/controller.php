<?php

$_GET = $_GET ? $_GET : [];
$_POST = $_POST ? $_POST : [];

$in = array_merge($_GET, $_POST);

$_GET['folder'] = ($_GET['folder']) ?? "board";
$_GET['file'] = $_GET['file'] ?? "list";

include_once "Controller/" . $_GET['folder'] . "/" . $_GET['file'] . "Controller.php";