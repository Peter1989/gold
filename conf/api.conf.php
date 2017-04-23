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
            'knowle' => array(
                '/knowledge/update/(\d+)' => array(
                    'access' => array('POST'),
                    'map_file' => '/app/knowledge/',
                    )
                ),
            );
}
