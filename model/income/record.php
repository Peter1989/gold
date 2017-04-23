<?php

$home = $_SERVER["HOME"];
$lib_dir = $home.'/mysite/gold/lib/mysql.lib.php';
require_once($lib_dir);

class RecordModel{
    public function get_income_records($uid){
        $gold_mysql = new Gold_mysql();
        $mysql = $gold_mysql->get_gold_mysql();
        $sql = "select * from record where uid=$uid order by timestamp desc"; 
        $res = $mysql->query($sql);
        return $res;
    }
}

?>
