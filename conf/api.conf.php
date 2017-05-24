<?php

class APIConf{
    public static $CONF = array(
            '/' => array(
                '/' => array(
                    'access' => array('GET'),
                    'map_file' => '/app/index.php',
                    'map_var' => array(),
                    ),
                ),
            //gold
            '/goldi' => array(
                '/goldinfo/price/date/(\d+)' => array(
                    'access' => array('GET'),
                    'map_file' => '/app/goldinfo/price/date/item/index.php',
                    'map_var' => array(
                        1 => 'date',
                        ),
                    ),
                '/goldinfo/income/record' => array(
                    'access' => array('GET'),
                    'map_file' => '/app/goldinfo/income/record/index.php',
                    'map_var' => array(),
                    ),
                ),
            //knowledge
            '/knowl' => array(
                    '/knowledge/update/(\d+)' => array(
                        'access' => array('POST'),
                        'map_file' => '/app/knowledge/',
                        )
                    ),

            //6month
            '/gold6' => array(
                    '/gold6month/display' => array(
                        'access' => array('GET'),
                        'map_file' => '/app/gold6month/display/index.php',
                        'map_var' => array(),
                        )
                    ),

            );
}
