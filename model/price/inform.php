<?php

if(PHP_SAPI == 'cli'){
    $home = $_SERVER["HOME"];
    $lib_dir = $home.'/mysite/gold/lib/redis.lib.php';
    require_once($lib_dir);
}

class InformModel{
        public function get_last_price(){
            $gold_redis = new Gold_redis();
            $redis = $gold_redis->get_gold_redis();
            $last_price = $redis->GET('last_gold_price');
            return $last_price;
        }

        public function insert_last_price($price){
            $gold_redis = new Gold_redis();
            $redis = $gold_redis->get_gold_redis();
            $redis->SET('last_gold_price', $price);
        }

        public function if_raise_inform(){
            $gold_redis = new Gold_redis();
            $redis = $gold_redis->get_gold_redis();
            $raise_inform = $redis->GET('raise_inform');
            return $raise_inform; 
        }

        public function set_inform_status($status){
            $gold_redis = new Gold_redis();
            $redis = $gold_redis->get_gold_redis();
            $redis->SET('raise_inform', $status);
        }
}
