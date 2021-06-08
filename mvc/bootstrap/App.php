<?php
/**
* App 클래스
*
*/
$singleTons = [];

class App
{
	/**
	* 동적 객체 생성 - singleTon -> 한번 생성한 객체는 다시 생성 X, 재활용 방식
	*
	*/
	public static function load($nsp, ...$args) 
	{
		$class = new ReflectionClass($nsp);
		$singleTons[$nsp] = isset($singleTons[$nsp])?$singleTons[$nsp]:"";
		
		if (!$singleTons[$nsp]) {
			$singleTons[$nsp] = $class->newInstanceArgs($args); // 동적 인수를 처리하면서 생성사 생성
		}
		
		return $singleTons[$nsp];
	}
	
	/**
	* 지정된 경로의 파일 및 디렉토리를 재귀적으로 전부 가져오는 함수
	*
	* @param String $dir 경로
	* @return Array 파일 경로
	*/
	public static function getFiles($dir) 
	{
		$list = [];
		$files = glob($dir . "/*");
		foreach ($files as $f) {
			if (is_dir($f)) { // 파일 경로가 디렉토리이면 재귀적으로 다시 파일명 추출 
				$list2 = App::getFiles($f);
				if ($list2) {
					$list = array_merge($list, $list2);
				}
			} else {
				$pi = pathinfo($f);
				if (strtolower($pi['extension']) == 'php') $list[] = $f;
			}
		}
		
		return $list;
	}

	
	/**
	* Request URI에 따른 라우팅 처리
	*
	*/
	public static function routes()
	{
		$URI = $_SERVER['REQUEST_URI'];
		$nsp = "\\Main\IndexController";
		
		if ($URI != '/') { 
		
			$pos = strpos($URI, "?");
			if ($pos !== false) {
				$URI = substr($URI, 0, $pos);
			}
			
			$URI = explode("/", $URI);
			if (count($URI) == 3) { 
				$folder = ucfirst($URI[1]);
				$className = ucFirst($URI[2])."Controller";
			} else if (count($URI) == 2) {
				$folder = ucfirst($URI[1]);
				$className = "IndexController";
			}
			
			$nsp = "\\{$folder}\\{$className}";
		}
		
		if (!class_exists($nsp)) {
			header("Location: /error");
			exit;
		}
		
		/** 컨트롤러 페이지 렌더링 */
		$controller = self::load($nsp);
		$controller->header();
		$controller->index();
		$controller->footer();
	}
	
	/**
	* 뷰 출력
	* Board/list
	*/
	public static function render($viewFile, $params = [])
	{
		$path = __DIR__ . "/../Views/".$viewFile.".php";
		if (!file_exists($path)) return;
		
		extract($params);
		
		ob_start();
		include $path;
		$content = ob_get_clean();
		
		echo $content;
	}

}