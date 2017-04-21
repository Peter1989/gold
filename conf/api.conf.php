<?php

class APIConf{
    public static $CONF = array(
            '/' => array(
                '/' => array(
                    'access' => array('GET'),
                    'map_file' => '/app/index.php',
                    'map_var' => array(),
                )
            ),
            //gold
            '/goldi' => array(
                '/goldinfo/price' => array(
                    'access' => array('GET'),
                    'map_file' => '/app/goldinfo/price.php',
                    'map_var' => array(),
                    )
                )
            );
}
