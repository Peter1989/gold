<?php

class Gold_redis{
    static $redis;
    public function get_gold_redis(){
        if(empty(Gold_redis::$redis)){
            Gold_redis::$redis = new Redis();        
            Gold_redis::$redis->connect('114.215.16.208', 6379);
        }
        return Gold_redis::$redis;
    }
}
