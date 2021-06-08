<?php
// Core
foreach (glob("bjh_Core/*") as $bjh_file) {
	include_once $bjh_file;
}

foreach (glob("bjh_Model/*") as $bjh_file) {
	include_once $bjh_file;
}

$bjh_db = new bjh_DB();