<?php
$date = $_REQUEST['date'];
$date_before = date('Ymd', strtotime($date) - 24*3600);
$date_after = date('Ymd', strtotime($date) + 24*3600);

$home = $_SERVER['HOME'];
$inform_path = $home.'/mysite/gold/data/goldinfo/price/inform.php';
$res = require_once($inform_path);

$inform_data = new InformData();
if(isset($_REQUEST['radio1'])){
    $status = trim($_REQUEST['radio1']);
    $inform_data->set_inform_trend($status);

    if($status == 'raise'){
       $price_now = $inform_data->get_price_now(); 
       $price_limit = $price_now - 0.9;
       $inform_data->set_price_limit($price_limit);
    }

    if($status == 'drop'){
        $price_now = $inform_data->get_price_now();
        $price_limit = $price_now + 0.9;
        $inform_data->set_price_limit($price_limit);
    }

    if($status == 'off'){
        $price_limit = 0;
        $inform_data->set_price_limit($price_limit);
    }
}

if(isset($_REQUEST['radio2'])){
    $status = trim($_REQUEST['radio2']);
    $inform_data->set_inform_limit($status);
}

$trend = $inform_data->get_inform_trend();
$price_limit = $inform_data->get_price_limit();
$inform_limit = $inform_data->get_inform_limit(); 
?>


<!Doctype Html>
<html>
<head>
<title><?php echo $date?></title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<style>
body{background-color:#bfd0c4;}
</style>
</head>
<body>
<br>

<span>当前提醒状态：<?php echo $trend?></span>&nbsp;&nbsp;
<span>当前止损位：<?php echo $price_limit?></span>&nbsp;&nbsp;
<span>止损位变化是否提醒：<?php echo $inform_limit?></span><br>
<form id="inform" action="" method="get">
    上升入仓<input style="width:50px;height:30px" type="radio" name="radio1" value="raise"/>&nbsp;&nbsp;  
    下降入仓<input style="width:50px;height:30px" type="radio" name="radio1" value="drop"/>&nbsp;&nbsp;
    平仓<input style="width:50px;height:30px" type="radio" name="radio1" value="off"/><br>
    止损位变化提醒<input style="width:50px;height:30px" type="radio" name="radio2" value="on"/>&nbsp;&nbsp;
    止损位变化不提醒<input style="width:50px;height:30px" type="radio" name="radio2" value="off"/><br><br>
    <input style="width:40px;height:40px" type="submit" value="Submit">提交</input>
</form>
</body>
</html>
