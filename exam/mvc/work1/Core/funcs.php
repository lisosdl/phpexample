<?php
/**
* 뷰 출력
*
* @param String $fileName - 확장자, 디렉토리 제외 순수 파일명
* @param Array $params - 뷰에 넘겨줄 데이터
*/
function view($fileName, $params = [])
{
	extract($params);
	include __DIR__ ."/../View/header.php"; // 헤더 
	include __DIR__ . "/../View/".$fileName . ".php";
	include __DIR__ . "/../View/footer.php"; // 푸터 
}

// 메세지 출력 
function msg($msg, $action = 0, $target = 'self')
{
	echo "<script>alert('{$msg}');</script>";
	if ($action) {
		if (is_numeric($action)) { //  history.go
			echo "<script>{$target}.history.go({$action});</script>";
		} else { // location.href
			echo "<script>{$target}.location.href='{$url}';</script>";
		}
	}
	
	exit;
}

// url 이동 
function go($url, $target = 'self')
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