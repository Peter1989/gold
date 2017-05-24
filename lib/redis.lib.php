<?php

class Gold_redis{
    static $redis;
    static function get_instance(){
        if(empty(Gold_redis::$redis)){
            Gold_redis::$redis = new Redis();        
            Gold_redis::$redis->connect('114.215.16.208', 6379);
        }
        return Gold_redis::$redis;
    }
}
