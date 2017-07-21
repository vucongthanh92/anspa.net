<?php
require("header.php");
require("phpmailer/class.phpmailer.php");
require("controllers/pagefixed/pagefixed.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $meta['title_page'];?></title>
	<meta http-equiv = "content-type" content = "text/html;charset=utf-8" />
	<meta name = "description" content = "<?php echo $meta['description_page'];?>" />
	<meta name = "keywords" content = "<?php echo $meta['keyword_page'];?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo USER_PATH_IMG; ?>favicon.ico">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<base href = "<?php echo BASE_URL;?>" />
    <link rel= "stylesheet" type = "text/css" href = "<?php echo USER_PATH_CSS;?>font-awesome.min.css" />
    <link rel= "stylesheet" type = "text/css" href = "<?php echo USER_PATH_CSS;?>bootstrap.min.css" />
	<link rel= "stylesheet" type = "text/css" href = "<?php echo USER_PATH_CSS;?>style.css" />
	<script type="text/javascript" src="<?php echo USER_PATH_JS;?>jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo USER_PATH_JS;?>bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo USER_PATH_JS;?>jquery.lazyload.js"></script>
    <script type="text/javascript" src="<?php echo USER_PATH_JS;?>jquery.website.js"></script>
    <script type="text/javascript" src="<?php echo USER_PATH_JS;?>jquery.price_format.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70919293-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<div id="baseurljs" style="display:none"><?php echo BASE_URL ?></div>
	<?php loadview('pagefixed/banner',$banner)?>
    <?php  if(!$_GET['mod']) loadview('pagefixed/slide',$slide); ?>
	<?php include 'main.php';?>
	<?php loadview('pagefixed/footer',$footer)?>
    
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3WRMbaAwwbzNvdIEyaiDzLEauZJzP6s2";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->
</body>
</html>


