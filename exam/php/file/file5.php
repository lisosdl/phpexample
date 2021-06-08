<?php

$handle = fopen("data2.txt", "a");
if ($handle !== false) {
	
	fwrite($handle, "789");
	fwrite($handle, "012");
	
	fclose($handle);
}