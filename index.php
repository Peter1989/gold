<?php
date_default_timezone_set('Asia/Shanghai');
set_include_path(
    get_include_path().PATH_SEPARATOR
    . __DIR__ . '/conf' . PATH_SEPARATOR
    . __DIR__ . '/lib' . PATH_SEPARATOR
    . __DIR__ . '/app/gold/conf' . PATH_SEPARATOR
    . __DIR__ . '/app/gold/lib' . PATH_SEPARATOR
);

require_once('api.conf.php');

function bootstrap(){
    
    $script_uri = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
    $api_prefix = substr($script_uri, 0, 6);

    if(!isset(APIConf::$CONF[$api_prefix])){
        var_dump('url wrong');exit;
    }

    $sub_conf = APIConf::$CONF[$api_prefix];
    foreach($sub_conf as $pattern => $api_conf){
        if(!preg_match("#^$pattern$#", $script_uri, $match)){
            continue;
        }
        $matched = true;
        break;
    }
    if(!$matched){
        var_dump('url wrong');exit;
    }

    if (!empty($api_conf['map_var']) && !empty($match)) {
        foreach ($api_conf['map_var'] as $idx => $varname) {
            if (!isset($match[$idx])) {
                var_dump('url var');exit;    
            }
            $_REQUEST[$varname] = $match[$idx];
        }
    }

    $_INVOKING_FILE_ = '';
    if(empty($match)){
        $_INVOKING_FILE_ = $api_conf['map_file'];
    }else{
        //如果map_file中有用变量符号，需要替换成uri中的实际值。
        $_INVOKING_FILE_ = preg_replace("#$pattern#", $api_conf['map_file'], $script_uri);
    }

    $_INVOKING_FILE_ = __DIR__ . $_INVOKING_FILE_;

    if(!file_exists($_INVOKING_FILE_)){
        var_dump('file not exist');exit;
    }
    $invoke_func = function() use ($_INVOKING_FILE_){
        require_once($_INVOKING_FILE_);
    };
    $invoke_func();
}

bootstrap();
