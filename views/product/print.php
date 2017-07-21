<?php
ob_start();
session_start();


include ("../../config/config_site.php");

$lang = $_SESSION['lang'];

if(file_exists("language/$lang.php")){
	include ("../../language/$lang.php");
}else{
//lang not exists, default language
	include ("../../language/vn.php");
	session_register("lang");
	$_SESSION['lang']="vn";
}

$conn = @mysql_pconnect("localhost","khachhang_nhd","nhat@123") or die("can not connect to server. may be server busy");
@mysql_select_db("khachhang_tanminhgiang",$conn) or die("can not select database now");
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
	vertical-align:middle;
}

h1{
	font-size:16px;
}

.promota .imgsp{
	float:left;
	width:340px;
	height:220px;
	margin-right:20px;
	border:1px #ccc solid;
	padding:1px;
}

.promota .printsp{
	background:url('<?php echo USER_PATH_IMG;?>linesp.jpg') no-repeat center top;
	margin-top:30px;
	text-align:center;
	padding-top:20px;
}

.promota .mota{
	float:left;
	width:350px;
	line-height:20px;
}

.procontent{
	clear:left;
	padding-top:20px;
}

.iconmota{
	font-weight:900;
	margin-bottom:10px;
	background:url('<?php echo USER_PATH_IMG;?>/mui-ten.jpg') no-repeat left 3px;
	height:20px;
	padding-left:30px;
	color:#106dcd;
	padding-top:3px;
}
</style>
</head>
<body>
<div class = 'detail-product'>
	<div class = 'promota'>
		<img class = 'imgsp' src = '<?php echo BASE_URL;?>data/Product/<?php echo ($data['prod']['images'] != NULL)?$data['prod']['images']:"11.jpg";?>'>
		<div class = 'mota'>
			<h1><?php echo $data['prod']['title_'.$lang];?></h1>
			<p><?php echo SP_MA.": <b><font color = '#008ddd'>".$data['prod']['codepro'];?></font></b></p>
			<p><?php echo SP_NSX.": <b>".$data['prod']['nsx'];?></b></p>
			<p><?php echo SP_GIA.": <b style = 'color:red;'>".$data['prod']['price']."</b> ".$data['prod']['unit'];?></p>
			<br/>
			<p><a href = ''><img src = '<?php echo USER_PATH_IMG.ADDCART;?>'></a></p>
			<p class = 'printsp'>
				<a href = 'javascript:openprintsp("<?php echo BASE_URL;?>printsp/<?php echo lang;?>/<?php echo $data['prod']['Id']; ?>/print.html");'><img src = '<?php echo USER_PATH_IMG;?>btn_print.gif'></a>
				<a href = 'javascript:window.close();'><img src = '<?php echo USER_PATH_IMG;?>btn_close.gif'></a>
			</p>
		</div>	
	</div>
	<div class = 'procontent'>
		<div id="tabs">
			<div class = 'iconmota'><?php echo THONGTINKYTHUAT;?></div>
			<div><?php echo stripslashes($data['prod']['description_'.$lang]);?></div>
			<div class = 'iconmota'><?php echo DACTINHKYTHUAT;?></div>
			<div><?php echo stripslashes($data['prod']['content_'.$lang]);?></div>
			<div class = 'iconmota'><?php echo KICHTHUOC;?></div>
			<div><?php echo stripslashes($data['prod']['kichthuoc_'.$lang]);?></div>
		</div>
	</div>
</div>
</body>
</html>