<?php
$board = new Board();
$list = $board->getList();
view("list", ["list" => $list]);