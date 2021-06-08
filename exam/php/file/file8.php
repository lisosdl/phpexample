<?php
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=data3.csv");
readFile("data3.csv");