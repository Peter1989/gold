<?php
$home = $_SERVER['HOME'];
$inform_path = $home.'/mysite/gold/data/goldinfo/income/record.php';
$res = require_once($inform_path);

$record_data = new RecordData();
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

    $list .= $v['timestamp'].'&nbsp;&nbsp;'.$change.'&nbsp;&nbsp;'.$v['amount'].'元</span><br><span>'; 
}

$list_out = rtrim($list, '<span>'); 

?>

<!Doctype Html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<style>
body{background-color:#bfd0c4;}
span{font-size:200%;}
</style>
</head>
<body>
<br>
<span>总收入：<?php echo $sum?></span>
<br><br>
<?php echo $list_out?>

</body>
</html>
