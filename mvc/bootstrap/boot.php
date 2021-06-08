<?php
/**
* 1. App 클래스 로딩 - O 
* 2. 필수 Core 소스 include - 공통 함수, Component, Controller을 자동추가  - O
* 3. Request URI에 따른 라우팅 - O 
*/
require __DIR__ . "/../vendor/autoload.php";
include_once "CommonLib.php";
include_once "App.php";

/** Monolog 추가 */
$logPath = __DIR__ . "/../../log/".date("Ymd").".log";
$logger = new Logger('general');
$logger->pushHandler(new StreamHandler($logPath, Logger::INFO));

$dirs = [__DIR__ . "/../Core", __DIR__ . "/../Component", __DIR__ . "/../Controller"];
include_once __DIR__ . "/../Controller/Controller.php";

foreach ($dirs as $dir) {
	foreach (App::getFiles($dir) as $file) {
		include_once $file;
	}
}

App::routes();
