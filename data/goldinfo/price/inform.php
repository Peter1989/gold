<?php

$home = $_SERVER["HOME"];
$model_path = $home.'/mysite/gold/model/price/inform.php';
require_once($model_path);

class InformData{
    public function set_price_now($price){
        $inform_model = new InformModel();
        $inform_model->set_price_now($price);
    }

    public function get_price_now(){
        $inform_model = new InformModel();
        $price= $inform_model->get_price_now();
        return $price;
    }

    public function set_price_limit($status){
        $inform_model = new InformModel();
        $inform_model->set_price_limit($status);
    }

    public function get_price_limit(){
        $inform_model = new InformModel();
        $trend = $inform_model->get_price_limit();
        return $trend;
    }

    public function set_inform_trend($status){
        $inform_model = new InformModel();
        $inform_model->set_inform_trend($status);
    }

    public function get_inform_trend(){
        $inform_model = new InformModel();
        $trend = $inform_model->get_inform_trend();
        return $trend;
    }

    public function set_inform_limit($status){
        $inform_model = new InformModel();
        $inform_model->set_inform_limit($status);
    }

    public function get_inform_limit(){
        $inform_model = new InformModel();
        $inform_limit = $inform_model->get_inform_limit();
        return $inform_limit;
    }
}
