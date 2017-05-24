<?php

$home = $_SERVER["HOME"];
$lib_dir = $home.'/mysite/gold/lib/redis.lib.php';
require_once($lib_dir);

class InformModel{

    public function get_price_now(){
        $redis =  Gold_redis::get_instance();
        $price = $redis->GET('price_now');
        return $price;
    }

    public function set_price_now($price){
        $redis = Gold_redis::get_instance();
        $redis->SET('price_now', "$price");
    }

    public function get_price_limit(){
        $redis =  Gold_redis::get_instance();
        $price_limit = $redis->GET('price_limit');
        return $price_limit;
    }

    public function set_price_limit($price){
        $redis = Gold_redis::get_instance();
        $redis->SET('price_limit', "$price");
    }

    public function get_inform_trend(){
        $redis = Gold_redis::get_instance();
        $raise_inform = $redis->GET('inform_trend');
        return $raise_inform;
    }

    public function set_inform_trend($status){
        $redis = Gold_redis::get_instance();
        $redis->SET('inform_trend', "$status");
    }

    public function get_inform_limit(){
        $redis = Gold_redis::get_instance();
        $raise_inform = $redis->GET('inform_limit');
        return $raise_inform;
    }

    public function set_inform_limit($status){
        $redis = Gold_redis::get_instance();
        $redis->SET('inform_limit', "$status");
    }
}
