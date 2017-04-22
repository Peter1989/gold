<?php

$home = $_SERVER["HOME"];
$model_path = $home.'/mysite/gold/model/price/inform.php';
require_once($model_path);

class InformData{
    public function set_inform_status($status){
        $inform_model = new InformModel();
        $inform_model->set_inform_status($status);
    }

    public function get_inform_statement(){
        $inform_model = new InformModel();
        $status = $inform_model->if_raise_inform();
        $statement = '';
        switch($status){
            case '1':
                $statement = '上升提醒';
                break;
            case '0':
                $statement = '下降提醒';
                break;
            default:
                $statement = '状态未知';
                break;
        }
        return $statement;
    }
}
