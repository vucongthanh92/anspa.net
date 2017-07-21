<?php
	$to = $data['email_admin'];
	$mpayment = new Models_MPayment;
	if(isset($_POST["btndathang"])){
		$error =0;
		$hoten = $_POST["hoten"];
		$email = $_POST["email"];
		$diachigiaohang = $_POST["diachigiaohang"];
		$dienthoai = $_POST["dienthoai"];
		$thuongtucthanhtoan = $_POST["phuongthucthanhtoan"];
		$thongtin =$_POST["thongtin"];
		if($hoten ==""){
			$error = 1;
			$message .= "Bạn  chưa nhập họ tên <br>";
		}
		if($email ==""){
			$error =1;
			$message .= "bạn  chưa nhập họ tên <br>";
		}
		if( isValidEmail($email) == false){
			$error =1;
			$message .= "Email không hợp lệ <br />"; 	
		}
		if($diachigiaohang ==""){
			$error = 1;
			$message .= "Bạn chưa nhập địa chỉ giao hàng <br>";
		}
		if($thuongtucthanhtoan ==0){
			$error = 1;
			$message .= "Bạn chưa chọn phương thức thanh toán <br>";
		}
		else if ($error == 0)
		{
			if($thuongtucthanhtoan == 1) $pt =" Thanh toán sau (thanh toán tại nhà)";
			if($thuongtucthanhtoan == 2) $pt ="Thanh toán trước ( chuyển khoản )";
			if($thuongtucthanhtoan == 3) $pt = " Đến trực tiếp công ty mua và thanh toán";
			//-----------------------------
			$i =0;
			$db = new Models_MProduct;
			$tongdonhang = 0;
			for($c=0 ; $c < count($_SESSION["giohang"]) ; $c++)
			{
			$i++;
			 $v = $_SESSION["giohang"][$c][8];
			 $id = $_SESSION["giohang"][$c][1];
			 if($id>0)
			 $row = $db->getOneProduct($id);
			 $nam = $_SESSION["giohang"][$c][2];
			 $nu = $_SESSION["giohang"][$c][3];
			 $betrai = $_SESSION["giohang"][$c][4];
			 $begai = $_SESSION["giohang"][$c][5];
			 $treem = $_SESSION["giohang"][$c][6];
	 		$fbetrai = $_SESSION["giohang"][$c][7];
			 $tongdonhang = $tongdonhang + $v*$row['price'];
			 
			  $sanpham .= '<tr>
				<td>'.$i.'</td>
				
				<td>'.$row["title_".lang].'<br />';
				
				if($nam !="0")   $sanpham .='<b>Nam:</b> '.$nam."<br />";
				if($nu !="0")  $sanpham .= '<b>Nữ:</b> '.$nu."<br />";
				if($betrai !="0")   $sanpham .='<b>Bé trai:</b> '.$betrai."<br />";
				if($begai !="0")   $sanpham .='<b>Bé gái:</b> '.$begai."<br />";
				if($treem !="0")   $sanpham .='<b>Trẻ em:</b> '.$treem."<br />";
				if($fbetrai !="0")   $sanpham .='<b>F Bé trai:</b> '.$fbetrai."<br />";
		
				$sanpham .= '</td>
				<td>'.$v.'</td>
				<td style="color:#FF0000; font-size:12px; font-weight:bold;">'. number_format($row["price"],0,",",".").' VNĐ</td>
				
			  </tr>';
			
			  } 
			///--------------------------------
			ob_start();
			echo file_get_contents("mail/emaidathang_admin.html");
			$noidung = ob_get_clean();
			$noidung =str_replace("{thongtinsanpham}", $sanpham ,$noidung);
			$noidung = str_replace("{tongdonhang}", bsVndDot($tongdonhang) , $noidung);
			$noidung = str_replace("{email}", $email, $noidung);
			$noidung = str_replace("{dienthoai}", $dienthoai , $noidung);
			$noidung =str_replace("{noidung}", $thongtin , $noidung);
			$noidung =str_replace("{phuongthucthanhtoan}", $pt , $noidung);
			$noidung =str_replace("{diachigiaohang}", $diachigiaohang , $noidung);
			$noidung =str_replace("{diachi}", $diachigiaohang , $noidung);
			$noidung =str_replace("{hoten}", $hoten , $noidung);
			$tieude = "Thông tin đơn đặt hàng từ Aogiadinh.net.vn";
			smtpmailer($to,$email,$hoten,$tieude,$noidung);
			// end goi mail admin
			ob_start();
			echo file_get_contents("mail/emaidathang_khachhang.html");
			$noidung1 = ob_get_clean();
			$noidung1 =str_replace("{thongtinsanpham}", $sanpham ,$noidung1);
			$noidung1 = str_replace("{tongdonhang}", bsVndDot($tongdonhang) , $noidung1);
			$noidung1 = str_replace("{email}", $email, $noidung1);
			$noidung1 = str_replace("{dienthoai}", $dienthoai , $noidung1);
			$noidung1 =str_replace("{noidung}", $thongtin , $noidung1);
			$noidung1 =str_replace("{phuongthucthanhtoan}", $pt , $noidung1);
			$noidung1 =str_replace("{diachigiaohang}", $diachigiaohang , $noidung1);
			$noidung1 =str_replace("{diachi}", $diachigiaohang , $noidung1);
			$noidung1 =str_replace("{hoten}", $hoten , $noidung1);
			$tieude = "Thông tin đơn đặt hàng Aogiadinh.net.vn";
			//smtpmailer($email,$to,'siêu thị sức khỏe gia đình',$tieude,$noidung1);
			
			$idmax = idMax(TBL_CUSTOMER) + 1;
			$infokh = array();
			$infokh['Id'] = $idmax;
			$infokh['fullname'] = $hoten;
			$infokh['email'] = $email;
			$infokh['address'] = $diachi;
			$infokh['deliveryaddress'] = $diachigiaohang;
			$infokh['tel'] = $dienthoai;
			$infokh['methodpay'] = $thuongtucthanhtoan;
			$infokh['note'] = $thongtin;
			$infokh['date'] = date("Y-m-d H:i:s");
			
			$mpayment->addCustomer($infokh);
			
			//them vao gio hang
			for($c=0 ; $c < count($_SESSION["giohang"]) ; $c++)
			{
				$v = $_SESSION["giohang"][$c][8];
				 $id = $_SESSION["giohang"][$c][1];
				 if($id >0 ){
				 $nam = $_SESSION["giohang"][$c][2];
				 $nu = $_SESSION["giohang"][$c][3];
				 $betrai = $_SESSION["giohang"][$c][4];
				 $begai = $_SESSION["giohang"][$c][5];
				 $treem = $_SESSION["giohang"][$c][6];
				 $fbetrai = $_SESSION["giohang"][$c][7];
				 
				$infocart = array(
					"idcustomer"	=> $idmax,
					"idpro"			=> $id,
					"amount"		=> $v,
					"nam"		=> $nam,
					"nu"		=> $nu,
					"betrai"		=> $betrai,
					"begai"		=> $begai,
					"treem"		=> $treem,
					"fbetrai"		=> $fbetrai,
				);
				$mpayment->addCustomerCart($infocart);
			}
			}
			
			unset($_SESSION["giohang"]);
			echo '<script>
				alert("Đăng ký mua hàng thành công");
				window.location ="home.html"; 
				</script>';
		}
		
		$data["error"] =$error;
		$data["message"] = $message;
		$data["hoten"] = $hoten;
		$data["diachigiaohang"] = $diachigiaohang;
		$data["thuongtucthanhtoan"] = $thuongtucthanhtoan;
		$data["email"] = $email;
		$data["diachi"] = $diachi;
		$data["dienthoai"] = $dienthoai;
		$data["thongtin"] = $thongtin;
	
	}
?>

<style type="text/css">
.noidung-sp table {   
	border-collapse: collapse;
    text-align: center;
}
.noidung-sp td,th { 
    border-color: #DCDCDC;
    border-style: solid;
    border-width: 1px;
    padding-bottom: 5px;
    padding-left: 3px;
    padding-right: 3px;
    padding-top: 5px;
	font-size:12px;
}
.noidung-sp .bg_tren {
	background-attachment: scroll;
    background-clip: border-box;
    background-color: #F5F5F5;
    background-image: none;
    background-origin: padding-box;
    background-position: 0 0;
    background-repeat: repeat;
    background-size: auto auto;
    color: #333333;
    font-size: 11px;
    font-weight: 700;
    text-align: center;
	
}
.noidung-sp .btn {
	padding:5px;
	background-color:#35a501;
	border:solid 1px #CCCCCC;
	color:#FFFFFF;
	border-radius:5px;
	font-size:12px;
	font-weight:bold;
}
.bg_body { text-align:left; font-family:Arial, Helvetica, sans-serif;}
.bg_body th {background-color: #F5F5F5;}
.bg_body td,th { padding-left:10px; font-size:12px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#333333}
.noidung-sp input[type=text] { width:300px; border:solid 1px #CCCCCC; height:25px;}
.noidung-sp textarea { width:350px; height:150px; border:solid 1px #CCCCCC}
.noidung-sp select { width:300px; padding:5px;border:solid 1px #CCCCCC; color:#333333}
</style>
<div class="grid">
<div class="brackum"><?=$data['map_title']?></div>
<div class="wap_main  dkav bkcart">

<h3 class="tib"> Thanh toán</h3>
<div class="space_10"></div>
<div  class = 'noidung-sp'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:2px;">
 <tr class="bg_tren">
    <th width="50">STT</th>
	<th width="120">Hình</th>
    <th >Tên sản phẩm</th>
    <th width="100">Số lượng</th>
    <th width="150">Giá</th>
  </tr>
 <?php session_start();
 	$i =1;
	$db = new Models_MProduct;
	$tongdonhang = 0;
	for($c=0 ; $c < count($_SESSION["giohang"]) ; $c++)
	{
	
	 $v = $_SESSION["giohang"][$c][8];
	 $id = $_SESSION["giohang"][$c][1];
	 if($id>0)
	  $info = $db->getOneProduct($id);
	 $nam = $_SESSION["giohang"][$c][2];
	 $nu = $_SESSION["giohang"][$c][3];
	 $betrai = $_SESSION["giohang"][$c][4];
	 $begai = $_SESSION["giohang"][$c][5];
	 $treem = $_SESSION["giohang"][$c][6];
	$fbetrai = $_SESSION["giohang"][$c][7];
	 $tongdonhang = $tongdonhang + $v*$info['price'];
 ?>
  <tr>
    <td><?=$i ?></td>
	 <td><img src="<?php echo PATH_IMG_PRODUCT.$info["images"] ?>" width="80"  /></td>
    <td align="left">
    	<p class="cart-name">
	<?php echo '<span>'.$info["title_".lang].'</span>';
		echo "<br />";
		if($nam !="0") echo '<b>Nam:</b> '.$nam."<br />";
		if($nu !="0") echo '<b>Nữ:</b> '.$nu."<br />";
		if($betrai !="0") echo '<b>Bé trai:</b> '.$betrai."<br />";
		if($begai !="0") echo '<b>Bé gái:</b> '.$begai."<br />";
		if($treem !="0") echo '<b>Trẻ em:</b> '.$treem."<br />";
		if($fbetrai !="0") echo '<b>F Bé trai:</b> '.$fbetrai."<br />";
	 ?>
    </p>
    </td>
    <td><?php echo $v; ?></td>
    <td style="color:#FF0000; font-size:12px; font-weight:bold;"><? echo bsVndDot($info["price"])." ".$info['unit']; ?> </td>
   
  </tr>
 <? 
 	$i++;
 } ?>
  <tr>
    <td colspan="4" align="right">Tổng giá trị đơn hàng: </td> 
	 <td colspan="2" style="color:#FF0000;font-size:12px; font-weight:bold;" ><? echo bsVndDot($tongdonhang); ?> VNĐ</td> 
  </tr>
  <tr>
 </tbody>
</table>
<h2 style="border:none; color:#35a501; margin-top:10px; font-size:16px;">Thông tin khách hàng</h2>
<div class="bg_body">
<?php
	if($error == 1 ){
		echo "<div class='error'>".$message."</div>";
	}
?>
<form action="payment/showorder/gio-hang.htm" method="post">
<table width="550" border="0" cellspacing="0" cellpadding="0" style="margin-left:80px; margin-top:10px; text-align:left;">
<tbody>
  <tr>
    <th width="150"><?=HOTEN ?><span style="color:#FF0000">*</span>:</th>
    <td><input type="text" name="hoten" value="<?=$data["hoten"] ?>" /></td>
  </tr>
  <tr>
    <th width="150">Email<span style="color:#FF0000">*</span>:</th>
    <td><input type="text" name="email" value="<?=$data['email'] ?>"  /></td>
  </tr>
  <tr>
    <th width="150">Địa chỉ giao hàng<span style="color:#FF0000">*</span>:</th>
    <td><input type="text" name="diachigiaohang" value="<?=$data['diachigiaohang'] ?>" /></td>
  </tr>
  <tr>
    <th width="150"><?=DIENTHOAI ?><span style="color:#FF0000">*</span>:</th>
    <td><input type="text" name="dienthoai" value="<?=$data['dienthoai'] ?>" /></td>
  </tr>
  <tr>
    <th width="150">Phương thức thanh toán<span style="color:#FF0000">*</span>:</th>
    <td>
		<select name="phuongthucthanhtoan">
			<option value="0">Phương thức thanh toán</option>
			<option value="1">Thanh toán sau (thanh toán tại nhà)</option>
			<option value="2">Thanh toán trước ( chuyển khoản )</option>	
            <option value="3"> Đến trực tiếp công ty mua và thanh toán</option>	
		</select>
	</td>
  </tr>
  <tr>
    <th width="150"><?=THONGTIN ?></th>
    <td><textarea name="thongtin"><?=$data['thongtin'] ?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="reset" value="Làm lại" class="btn" />&nbsp;&nbsp;<input type="submit" name="btndathang" value="Đặt hàng" class="btn" /></td>
  </tr>
 </tbody>
</table>


</form>
</div>

</div>
<div class = "clear"></div>
</div>
<div class="space_10"></div>
</div>