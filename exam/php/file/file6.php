<?php

$handle = fopen("cell.csv", "r");
if ($handle !== false) {
	echo "<pre>";
	while(!feof($handle)) {
		$data = fgetcsv($handle);
		foreach ($data as $k => $v) {
			$v = iconv("EUC-KR", "UTF-8", $v);
			$data[$k] = $v;
		}
		print_r($data);
	}
	
	fclose($handle);
}