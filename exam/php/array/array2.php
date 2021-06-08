<?php
$a = [
	'키1' => '값1',
	'키2' => '값2',
	'키3' => '값3',
	'키4' => '값4',
];

foreach ($a as $key => $value) {
	echo "{$key}, {$value} <br>";
}

foreach ($a as $value) {
	echo "{$value} <br>";
}
