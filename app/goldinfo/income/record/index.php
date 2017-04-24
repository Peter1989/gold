<?php
$home = $_SERVER['HOME'];
$inform_path = $home.'/mysite/gold/data/goldinfo/income/record.php';
$res = require_once($inform_path);

$record_data = new RecordData();

if(isset($_REQUEST['radio1']) && isset($_REQUEST['amount'])){
    $increase = trim($_REQUEST['radio1']);
    $amount = trim($_REQUEST['amount']);
    $reason = trim($_REQUEST['reason']);
    $uid = 1;
    if(!empty($amount) && is_numeric($amount)){
        $record_data->set_income_records($uid, $increase, $amount, $reason); 
    }
}

$res = $record_data->get_income_records(1);
$list = '<span>';
$change = '';
$sum = 0;
foreach($res as $v){
    if($v['increase'] == '1'){
        $change = '收入了'; 
        $sum += $v['amount'];
    }else{
        $change = '亏损了';
        $sum -= $v['amount'];
    }

    $list .= $v['timestamp'].'&nbsp;&nbsp;'.$change.'&nbsp;&nbsp;'.$v['amount'].'元&nbsp;原因：'.$v['reason'].'</span><br><span>'; 
}

$list_out = rtrim($list, '<span>'); 
?>

<!Doctype Html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<style>
form{position:absolute;top:80%;left:70%;font-size:250%;}
body{background-color:#bfd0c4;}
span{font-size:150%;}
a{font-size:150%;}
</style>
</head>
<body>
<br>
<form id='form1' action="" method='post'>
收入<input style="width:30px;height:20px" type='radio' value='1' name='radio1'/>&nbsp;&nbsp;&nbsp;&nbsp;
亏损<input style="width:30px;height:20px" type='radio' value='0' name='radio1'/><br>
金额&nbsp;&nbsp;&nbsp;&nbsp;<input id="t" style="width:70px;height:20px" type='text' name='amount' value=''/><br>
原因&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:150px;height:20px" type='text' name='reason' value=''/>
&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:70px;height:25px" type='button' value="Submit" onClick="form1.submit();form1.reset();"/>
</form>
<br>
<span>总收入：<?php echo $sum?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/">回到首页</a>
<br><br>
<?php echo $list_out?>
</body>
</html>
