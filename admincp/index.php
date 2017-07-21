<?php
include ('header.php');

$mod = varGetPost('mod');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Welcome to admin</title>
<meta http-equiv = "Content-Type" content = "text/html;charset=utf-8" />
<link rel = 'stylesheet' type = 'text/css' href = '<?php echo ADMIN_PATH_CSS; ?>style.css'/>

<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajax.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>checkdata.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>warning.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajaxcontent.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajax_ticlock.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>hideshow.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajaxdelfile.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>number.js'></script>
<!-- menu left-->
	<script src="<?php echo ADMIN_PATH_PUBLIC;?>menuleft/menu.js" type="text/javascript"></script>
    <link  rel = 'stylesheet' type = 'text/css' href="<?php echo ADMIN_PATH_CSS;?>redmond/jquery-ui-1.8.5.custom.css" />
    <script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>jquery-1.4.2.min.js'></script>
    <script src = '<?php echo ADMIN_PATH_JS; ?>jquery-ui-1.8.5.custom.min.js'></script>
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PATH_PUBLIC;?>menuleft/style_left.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!--[if lt IE 8]>
   <style type="text/css">
   li a {display:inline-block;}
   li a {display:block;}
   </style>
   <![endif]-->

<!-- end menu -->

<script language="javascript" type="text/javascript">
function thongbao(info)
{
	cf=confirm(info);
	//alert(cf);
	if (cf==true)
		return 'return'+true;
	else {
	return 'return'+false;
	}
}
</script>
   
</head>
<body>
<table width = "100%">
	<tr>
		<td colspan = "2"><div id = 'title'><a href = '<?php echo BASE_URL;?>' target = 'blank'>Trang chủ</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href = '<?php echo BASE_URL_ADMIN?>logout'>Thoát</a></div></td>
	</tr>
	<tr>
		<td width = "10%" valign = "top">
			<?php include ('left.php'); ?>
		</td>
		<td id = 'noidung' valign = "top">
			<?php
			
			switch($mod)
			{
				case 'about': 
					include ('controllers/about/controller.php');
					break;	
				case 'comment': 
					include ('controllers/comment/controller.php');
					break;	
				case 'catservices': 
					include ('controllers/catservices/controller.php');
					break;	
				case 'services': 
					include ('controllers/services/controller.php');
					break;	
				case 'about': 
					include ('controllers/about/controller.php');
					break;	
				case 'chuyenkhoa': 
					include ('controllers/chuyenkhoa/controller.php');
					break;	
				case 'bacsy': 
					include ('controllers/bacsy/controller.php');
					break;	
				case 'email': 
					include ('controllers/email/controller.php');
					break;	
				case 'nhomthietbi': 
					include ('controllers/nhomthietbi/controller.php');
					break;
				case 'thietbi': 
					include ('controllers/thietbi/controller.php');
					break;
				case 'flash': 		include ('controllers/flash/controller.php');break;
				case 'gallery': 		include ('controllers/gallery/controller.php');break;
				case 'picture': 		include ('controllers/picture/controller.php');break;
				//picture
				case 'picture': 	include ('controllers/picture/controller.php');break;	
				//payment
				case 'payment': 
					include ('controllers/payment/paymentcontroller.php');
					break;	
				//configuration
				case 'titlepage': 
					include ('controllers/titlepage/list.php');
					break;	
				//pagehtml
				case 'pagehtml': 
					include ('controllers/pagehtml/pagehtmlcontroller.php');
					break;	
				case 'catelog': 
					include ('controllers/catelog/catelogcontroller.php');
					break;
				case 'product': 
					include ('controllers/product/productcontroller.php');
					break;
					
				//tin tuc	
				case 'news': 
					include ('controllers/news/newscontroller.php');
					break;
				case 'catnews': 
					include ('controllers/catnews/catnewscontroller.php');
					break;
	
				//	hinh banner
				case 'banner': 
					include ('controllers/banner/bannercontroller.php');
					break;
					
				//	user admin
				case 'user': 
					include ('controllers/user/usercontroller.php'); 
					break;
				case 'logout':
					include ('logout.php');
					break;
					
				default:
					include('general.php');
					break;
			}
			?>
		</td>
	</tr>
</table>
</body>
</html>

<?
ob_end_flush();
?>