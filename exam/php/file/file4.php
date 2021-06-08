<?php

$handle = fopen("data1.txt", "w");
if ($handle !== false) {
	
	fwrite($handle, "파일쓰기");
	fwrite($handle, "다시쓰기");
	
	fclose($handle);
}