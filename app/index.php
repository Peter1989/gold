<?php
$date = date('Ymd');
?>
<!Doctype Html>
<html>
<head>
<title>首页</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<style type="text/css">
body{background-color:#bfd0c4;}
a {font-size: 200%}
</style>
</head>
<body>
<br>
<a href="/goldinfo/price/date/<?php echo $date?>">当日金价</a><br>
<a href="/goldinfo/income/record">盈亏记录</a><br>
</body>
