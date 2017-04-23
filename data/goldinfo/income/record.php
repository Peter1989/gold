<?php
$home = $_SERVER["HOME"];
$model_path = $home.'/mysite/gold/model/income/record.php';
require_once($model_path);
class RecordData{
    public function get_income_records($uid){
        $gold_model = new RecordModel();
        $res = $gold_model->get_income_records($uid);
        $data = array();
        while($tmp = $res->fetch_assoc()){
            $data[] = $tmp;
        }
        return $data;
    }
}

?>
