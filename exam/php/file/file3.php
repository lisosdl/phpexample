<?php

$handle = fopen("file.txt", "r"); // 파일을 열기
if ($handle !== false) {
	// 파일을 이동하면서 읽는다, 파일의 끝에 도달해서 더이상 읽을 데이터가 없을때 까지 feof
	$no = 1;
	while(!feof($handle)) { // 파일의 끝에 도달하지 않는다면 반복해서 데이터 읽기
		$data = fgets($handle);
		echo $no . ". " . $data . "<br>";
		$no++;
	}
	
	fclose($handle); // 파일 닫기
}