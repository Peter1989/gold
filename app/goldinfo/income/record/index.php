<?php
$home = $_SERVER['HOME'];
$inform_path = $home.'/mysite/gold/data/goldinfo/income/record.php';
$res = require_once($inform_path);

$record_data = new RecordData();
$res = $record_data->get_income_records(1);



?>


