<?php

if(isset($_POST['btngui']))
{
		$to=$title['emaillienhe_vn'];
	 	$ten=$_POST['hoten'];
		$email=$_POST['email'];
		$tell=$_POST['title'];
		$cont=$_POST['note'];
		if (get_magic_quotes_gpc()== false) {
			$ten=trim(mysql_real_escape_string($ten));
			$email=trim(mysql_real_escape_string($email));
			$tell=trim(mysql_real_escape_string($tell));
			$cont=trim(mysql_real_escape_string($cont));
		}
		if($ten==""||$email==""||$cont==""){
			$error= 1;
			$mesage .= "Nhập thông tin chưa đầy đủ <br />"; 
		}
		if( isValidEmail($email) == false){
			$error =1;
			$mesage .= "Email không hợp lệ <br />"; 	
		}
		if($error==0){
			$from=$email;
			$tieude="Liên hệ";
			ob_start();
			echo file_get_contents("mail/emaillienhetukhachhang.html");
			$noidung = ob_get_clean();
			$noidung =str_replace("{hoten}", $ten ,$noidung);
			$noidung = str_replace("{email}", $email, $noidung);
			$noidung = str_replace("{dienthoai}", $tell , $noidung);
			$noidung =str_replace("{noidung}", $cont , $noidung);
			$noidung1 .="Chào <b>$ten</b>! Cảm ơn bạn đã liên hệ với chúng tôi.<br>";
			$noidung1 .="Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!<br> ";
		
			smtpmailer($to,$from,$ten,$tieude,$noidung);
			smtpmailer($from,$to,"anspa.net",$tieude,$noidung1);
			echo '<script>alert("Gửi liên hệ thành công !")</script>';
		}
		$ct["error"] =$error;
		$ct["mesage"] = $mesage;
		$ct["hoten"] = $ten;
		$ct["email"] = $email;
		$ct["tel"] = $tell;
		$ct["note"] = $cont;
}

$mcontact = new Models_MPagehtml;
$ct['ttlienhe'] = $mcontact -> getpagehtmlid('2');
/*
 * tieu de trang
 */
$ct['map_title'] =  $map_title.$arrowmap."<a href='lien-he.htm'>Liên hệ</a>";

loadview("contact/contact",$ct);

?>