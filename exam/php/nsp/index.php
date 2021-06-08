<?php
include "nsp1.php";
include "nsp2.php";

use \A\B\C\D\E;

$obj1 = new E\ClassA();

$obj2 = new B\ClassA();

echo "<pre>";
print_r($obj1);
print_r($obj2);