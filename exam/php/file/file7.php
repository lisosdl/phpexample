<?php

$handle = fopen("data3.csv", "w");
if ($handle !== false) {
	$csv = ['컬럼1', '컬럼2', '컬럼3', '컬럼4', '컬럼5'];
	fputcsv($handle, $csv);
	
	$csv = [1,2,3,4,5];
	fputcsv($handle, $csv);
	
	$csv = [6,7,8,9,10];
	fputcsv($handle, $csv);
	
	fclose($handle);
}