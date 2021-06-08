<?php

/**
* 뷰 출력 함수
* 현재 컨트롤러에 따라 자동으로 뷰출력
*
* @param Array $params 키 => 값, ...
* @return $키 = 값, ...
*/
function view($params = [])
{
	global $url;
	// 뷰출력을 위해 배열형태로 재구성
	$mode = explode("/", $url);
	if (nonePage($mode, "Views")) { // 페이지가 존재할경우
		// view페이지에 키=값 형태로 반환
		extract($params);
		// Admin or Front 모드에 따른 header, footer 출력
		include "Views/".$mode[0]."/Outline/header.php";
		include "Views/" . $url . ".php";
		include "Views/".$mode[0]."/Outline/footer.php";
	} else { // 페이지가 없을경우 404에러페이지
		// 404에러페이지 출력
		include "Views/".$mode[0]."/Outline/header.php";
		include "Views/Exception/error.php";
		include "Views/".$mode[0]."/Outline/footer.php";
	}
}

/**
* 없는페이지 처리
* 디렉토리의 모든파일을 순회 해당 파일이 없을경우 false, 있을경우 true를 반환
*
* @param Array $_GET['mode'], $_GET['dir'], $_GET['file']
* @return Boolean true||false
*/
function nonePage($params = [], $dir)
{
	foreach(glob($dir."/".$params[0]."/".$params[1]."/*") as $v) {
		$v = explode("/", $v);
		$v = array_reverse($v);
		$v = $v[0];
		$params[2] = $params[2].".php";
		if ($v == $params[2]) { // 페이지가 존재할경우 true를 반환
			return true;
		}
	}
	// 페이지가 존재하지 않을경우 false를 반환
	return false;
}

/**
* 메세지 출력 함수
*
*/
function msg($msg)
{
	// 메세지 출력 후 이전페이지로
	echo "<script>alert('{$msg}');history.back();</script>";
	exit;
}

/**
* 페이지 이동 함수
* 
*/
function url($url)
{
	echo "<script>location.href='{$url}';</script>";
	exit;
}