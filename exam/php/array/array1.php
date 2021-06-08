<?php
/** 인덱스배열 **/
// 표현방식1
$a = array(1, 2, 3, 4, 5);

echo "<pre>";
print_r($a);

$a2 = array('apple', 'melon', 'banana');

print_r($a2);

// 표현방식2
$b = [1, 2, 3, 4, 5];

print_r($b);

$b2 = ['apple', 'melon', 'banana'];

// 추가
$b2[3] = 'orange';
$b2[] = 'mango';
// 수정
$b2[1] = 'banana2';
// 삭제
unset($b2[2]);
// 정렬
$b2 = array_values($b2);

print_r($b2);

/** 연관배열 **/
$c = [
	'키1' => '값1',
	'키2' => '값2',
	'키3' => '값3',
];

// 값 추가
$c['키4'] = '값4';
$c['키5'] = '값5';
$c['키6'] = '값6';

array_push($c, '추가1', '추가2', '추가3');

array_unshift($c, '앞1', '앞2', '앞3');

print_r($c);



