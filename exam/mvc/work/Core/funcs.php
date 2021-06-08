<?php
/**
* 뷰 출력 
*
* @param String $fileName - 확장자, 디렉토리 제외한 순수한 파일명
* @param Array $params Controller에서 넘겨주는 데이터 
*/
function view($fileName, $params = [])
{
	extract($params);
	include __DIR__ . "/../View/header.php"; // 헤더 
	$path = __DIR__ . "/../View/".$fileName.".php";
	include $path;
	include __DIR__ . "/../View/footer.php"; // 푸터 
}

// 알림 메세지 출력 
function msg($msg, $action = 0, $target = "self")
{
	echo "<script>alert('{$msg}');</script>";
	if ($action) {
		if (is_numeric($action)) { // history.go
			echo "<script>{$target}.history.go({$action});</script>";
		} else { // 링크 이동 
			echo "<script>{$target}.location.href='{$action}';</script>";
		}
	}
	exit;
}

// 새로고침 
function reload($target = "self")
{
	echo "<script>{$target}.location.reload();</script>";
	exit;
}

function go($url, $target = "self")
{
	echo "<script>{$target}.location.href='{$url}';</script>";
	exit;
}

function debug($v)
{
	echo "<xmp>";
	print_r($v);
	echo "</xmp>";
}