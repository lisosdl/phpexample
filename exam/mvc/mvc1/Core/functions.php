<?php
// 뷰 출력
function view($fileName, $params = [])
{
	extract($params);
	include __DIR__ . "/../View/header.php";
	$path = __DIR__ . "/../View/".$fileName.".php";
	include $path;
	include __DIR__ . "/../View/footer.php";
}

// 메세지 출력
function msg($msg, $action = 0, $target = "self")
{
	echo "<script>alert('{$msg}');</script>";
	if ($action) {
		if (is_numeric($action)) {
			echo "<script>{$target}.histroy.go({$action});</script>";
		} else {
			echo "<script>{$target}.location.href='{$action}';</script>";
		}
	}
	exit;
}

// 새로고침
function reload($target = "self")
{
	echo "<script>{$target}.location.reload();</script>";
}

// 경로이동
function go($url, $target = 'self')
{
	echo "<script>{$target}.location.href='{$url}';</script>";
	exit;
}