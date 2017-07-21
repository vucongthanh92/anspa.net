<?php 
include ('../config/config_site.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<link rel="stylesheet" type="text/css" href="public/css/style_login.css" />

<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajax.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajax_login.js'></script>
<head>
<meta http-equiv = "Content-Type" Content = 'text/html;charset=utf-8' />
</head>
<body>
<div id = 'formlogin'>
	<div id = 'login'>
		<div id = 'ndtb_login'>Đăng nhập hệ thống<p style = 'margin-top:5px;'><a href = ''></a></p></div>
		<div id = 'login_response'></div>
		<form action = 'javascript:login();' method = 'post'>
		<div id = 'ndform_login'>
			<label>Username:</label><input type = 'text' name = 'user' id = 'user'><br/>
			<label>Email:</label><input type = 'text' name = 'email' id = 'email'><br/>
			<label>Password:</label><input type = 'password' name = 'pass' id = 'pass'><br/>
			<label>&nbsp;</label><input type = 'submit' name = 'login' id = 'submit' value = 'Đăng nhập' style = 'width:100px;'><br/>
		</div>
		</form>
	
		<div id = 'forgotpass'>
	
		</div>
	</div>
</div>
</body>
</html>