<?php

class Gold_mysql{
    static $mysql;
    public function get_gold_mysql(){
        if(empty(Gold_mysql::$mysql)){
            Gold_mysql::$mysql = new mysqli('114.215.16.208', 'dongyang', 'MhxzKhl', 'gold');
        }
        return Gold_mysql::$mysql;
    }
}
