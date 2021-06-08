<?php
/**
* 공통 함수 
*
*/
function debug($v) 
{
	echo "<xmp>";
	print_r($v);
	echo "</xmp>";
}

/** 
* 설정파일 추출 
*
*/
function getConfig()
{
	$iniPath = __DIR__ ."/../../config.ini";
	$conf = parse_ini_file($iniPath);
	
	return isset($conf)?$conf:[];
}