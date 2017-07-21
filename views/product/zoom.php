<?php
ob_start();
session_start();

include ("../../config/config_site.php");

$conn = @mysql_pconnect("localhost","root","") or die("can not connect to server. may be server busy");
@mysql_select_db("mn_tananvinh",$conn) or die("can not select database now");
mysql_query ("SET NAMES utf8");

$id = $_GET['id'];
$sql = mysql_query("select * from ".TBL_PRODUCT." where Id = '$id'") or die (mysql_error()); 
$data['prod'] = mysql_fetch_assoc($sql);

?>

<html>
<head>
<title>Công ty Cổ Phần Thiết Bị Tân Minh Giang</title>
<meta http-equiv = "content-type" content = "text/html;charset=utf-8" />
<style type = 'text/css'>

*{
	margin:0;
	padding:0;
}

body{
	min-width:731px;
}

img{
border:0;
}

</style>
</head>
<body>
<img src = '<?php echo BASE_URL;?>data/Product/<?php echo $data['prod']['images'];?>'>
</body>
</html>