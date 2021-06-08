<?php

include "namespace1.php";
include "namespace2.php";

use A\B\C\D;

$obj1 = new D\ClassA();
$obj2 = new \B\ClassA();

echo "<pre>";
print_r($obj1);
print_r($obj2);

D\test();