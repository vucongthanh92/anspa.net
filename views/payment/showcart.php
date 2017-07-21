<?php 
session_start();
$to = $data['email_admin'];
$mpayment = new Models_MPayment;
if(isset($_POST["hoten"])){
	$error =0;
	$hoten = $_POST["hoten"];
	$ship_price = $_POST["ship_price"];
	$email = $_POST["email"];
	$diachigiaohang = $_POST["diachigiaohang"];
	$diachi = $_POST["diachi"];
	$dienthoai = $_POST["dienthoai"];
	$thuongtucthanhtoan = $_POST["phuongthucthanhtoan"];
	$thongtin =$_POST["thongtin"];
	if($hoten ==""){
		$error = 1;
		$message .= "Bạn chưa nhập họ tên <br>";
	}
	if( isValidEmail($email) == false){
		$error =1;
		$message .= "Email không hợp lệ <br />"; 	
	}
	if($diachi ==""){
		$error = 1;
		$message .= "Bạn chưa nhập địa chỉ<br>";
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
		if($thuongtucthanhtoan == 1) $pt ="Thanh toán trực tiếp";
		if($thuongtucthanhtoan == 2) $pt ="Chuyển khoản ngân hàng";
		//-----------------------------
		$i =0;
		$db = new Models_MProduct;
		$tongdonhang = 0;
		foreach($_SESSION['cart2'] as $k=>$v)
		{
			$i++;
		    if($k>0)
		 	$row = $db->getOneProduct($k);
			$tongdonhang = $tongdonhang + ($row["price"] *$v);
		  $sanpham .= '<tr>
			<td>'.$i.'</td>
			<td>'.$row["title_vn"].'<br />';
			$sanpham .= '</td>
			<td>'.$v.'</td>
			<td style="color:#FF0000; font-size:12px; font-weight:bold;">'. bsVndDot($row["price"]).' VNĐ</td>
			
		  </tr>';
		
		  } 
		///--------------------------------
		ob_start();
		echo file_get_contents("mail/emaidathang_admin.html");
		$noidung = ob_get_clean();
		$noidung =str_replace("{thongtinsanpham}", $sanpham ,$noidung);
		$noidung = str_replace("{phiship}", bsVndDot($ship_price),$noidung);
		$noidung = str_replace("{tongdonhang}", bsVndDot($tongdonhang+$ship_price),$noidung);
		$noidung = str_replace("{email}", $email, $noidung);
		$noidung = str_replace("{dienthoai}", $dienthoai , $noidung);
		$noidung =str_replace("{noidung}", $thongtin , $noidung);
		$noidung =str_replace("{phuongthucthanhtoan}", $pt , $noidung);
		$noidung =str_replace("{diachigiaohang}", $diachigiaohang , $noidung);
		$noidung =str_replace("{diachi}", $diachigiaohang , $noidung);
		$noidung =str_replace("{hoten}", $hoten , $noidung);
		$tieude = "Thông tin đơn đặt hàng từ dacsanqueminh.com";
		smtpmailer($to,$email,$hoten,$tieude,$noidung);
		// end goi mail admin
		ob_start();
		echo file_get_contents("mail/emaidathang_khachhang.html");
		$noidung1 = ob_get_clean();
		$noidung1 =str_replace("{thongtinsanpham}", $sanpham ,$noidung1);
		$noidung1 = str_replace("{phiship}", bsVndDot($ship_price),$noidung1);
		$noidung1 = str_replace("{tongdonhang}", bsVndDot($tongdonhang+$ship_price),$noidung1);
		$noidung1 = str_replace("{email}", $email, $noidung1);
		$noidung1 = str_replace("{dienthoai}", $dienthoai , $noidung1);
		$noidung1 =str_replace("{noidung}", $thongtin , $noidung1);
		$noidung1 =str_replace("{phuongthucthanhtoan}", $pt , $noidung1);
		$noidung1 =str_replace("{diachigiaohang}", $diachigiaohang , $noidung1);
		$noidung1 =str_replace("{diachi}", $diachigiaohang , $noidung1);
		$noidung1 =str_replace("{hoten}", $hoten , $noidung1);
		$tieude = "Thông tin đơn đặt hàng dacsanqueminh.com";
		smtpmailer($email,$to,'dacsanqueminh.com',$tieude,$noidung1);
		
		$idmax = idMax(TBL_CUSTOMER) + 1;
		$infokh = array();
		$infokh['Id'] = $idmax;
		$infokh['fullname'] = $hoten;
		$infokh['email'] = $email;
		$infokh['address'] = $diachi;
		$infokh['deliveryaddress'] = $diachigiaohang;
		$infokh['tel'] = $dienthoai;
		$infokh['ship'] = $ship_price;
		$infokh['methodpay'] = $thuongtucthanhtoan;
		$infokh['note'] = $thongtin;
		$infokh['date'] = date("Y-m-d H:i:s");
		
		$mpayment->addCustomer($infokh);
		
		//them vao gio hang
		foreach($_SESSION['cart2'] as $k=>$v){
		{	 
			$infocart = array(
				"idcustomer"	=> $idmax,
				"idpro"			=> $k,
				"amount"		=> $v,
			);
			$mpayment->addCustomerCart($infocart);
		}
		}
		unset($_SESSION["cart2"]);
		echo '<script>
			alert("Đăng ký mua hàng thành công");
			window.location ="/"; 
			</script>';
	}

}
?>
<div class="top_page">
    <div class="grid">
        <div class="detailnews_top">
             <h2 class="title"><span>Đặt Hàng</span></h2>                  
        </div>
    </div>
</div>

<div class="grid">
<?php
	if($error == 1 ){
		echo "<div class='alert alert-danger'>".$message."</div>";
	}
?>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="" enctype="multipart/form-data">
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="check_out-left">
    	<div class="cart_content">
    		<div class="detailnews_main">
<div class="col-md-12 col-sm-12 col-xs-12 form_check_out">         
<div class="col2-set" id="customer_details">
<div class="col2-set">  
<div class="woocommerce-billing-fields">
<p class="form-row " ><label  class="">Họ và tên<abbr class="required" title="bắt buộc">*</abbr></label><input type="text" class="input-text " name="hoten" placeholder="Họ và tên người liên hệ" value="<?php echo $hoten; ?>"></p>
<p class="form-row"><label class="">Số điện thoại  <abbr class="required" title="bắt buộc">*</abbr></label><input type="text" class="input-text " name="dienthoai" placeholder="Số điện thoại liên hệ" value="<?php echo $dienthoai; ?>"></p>
<div class="clearfix"></div>
<p class="form-row" ><label  class="">Địa chỉ  <abbr class="required" title="bắt buộc">*</abbr></label><input type="text" class="input-text " name="diachi" placeholder="Địa chỉ giao hàng" value="<?php echo $diachi; ?>"></p>

<p class="form-row"> <label class="">Địa chỉ giao hàng<abbr class="required" title="bắt buộc">*</abbr></label><input type="text" class="input-text " name="diachigiaohang"  placeholder="Địa chỉ giao hàng" value="<?php echo $diachigiaohang; ?>">
</p>

<p class="form-row"> <label class="">Khu Vực<abbr class="required" title="bắt buộc">*</abbr></label>
<select name="city" id="city">
    <option value="">- - chọn tỉnh/thành phố - -</option>
    <?php
	    $sql="select * from mn_nhomthietbi where parentid='0' and ticlock='0'";
		$ds=mysql_query($sql) or die(mysql_error());
		while($row=mysql_fetch_assoc($ds)) {
	?>
    <option <?php if($row['price']==$_SESSION['ship_price']) echo "selected"; ?> value="<?=$row['price']?>"><?=$row['title_vn']?></option>
    <?php
	    $idcat=$row['Id'];
	    $sql2="select * from mn_nhomthietbi where parentid='$idcat' and ticlock='0'";
		$ds2=mysql_query($sql2) or die(mysql_error());
		while($row2=mysql_fetch_assoc($ds2)) {
	?>
        <option <?php if($row2['price']==$_SESSION['ship_price']) echo "selected"; ?> value="<?=$row2['price']?>">-----<?=$row2['title_vn']?></option>
    <?php } ?>
    <?php } ?>
</select>
</p>
<input type="hidden" name="ship_price" class="ship_price_class" value="
<?php  
	 if(isset($_SESSION['ship_price'])) echo $_SESSION['ship_price'];
	 else echo "0";
?>" />



<div class="clearfix"></div>
<p class="form-row" ><label for="billing_email" class="">Email <abbr class="required" title="bắt buộc">*</abbr></label><input type="text" class="input-text " name="email" id="billing_email" placeholder="Email" value="<?php echo $email; ?>"></p>
</div>
<div class="clearfix"></div>
<p class="form-row" ><label for="billing_email" class="">Hình thức thanh toán <abbr class="required" title="bắt buộc">*</abbr></label><select name="phuongthucthanhtoan">
	<option value="">Chọn hình thức thanh toán</option>
    <option value="1" <?php if($thuongtucthanhtoan==1) echo "selected"; ?>>Thanh toán trực tiếp</option>
    <option value="2" <?php if($thuongtucthanhtoan==2) echo "selected"; ?>>Chuyển khoản ngân hàng</option>
    </select></p>
</div>
</div>
<div class="col2-set">
    <div class="woocommerce-shipping-fields">
		<p class="form-row notes woocommerce-validated" id="order_comments_field"><label for="order_comments" class="">Ghi chú đơn hàng</label><textarea name="order_comments" class="input-text " id="order_comments" placeholder="Ghi chú về đơn hàng, ví dụ: lưu ý khi giao hàng." rows="2" cols="5"><?php echo $thongtin; ?></textarea></p>
        </div>
</div>
</div>
</form>
</div>
		</div>
	</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="cart_custom">
	<div class="about_gt">
		<form action="<?php echo BASE_URL."payment/editcart.htm" ?>" method="post" class="quantity-form">


<table class="shop_table cart" cellspacing="0">
	<thead>
		<tr>
			<th class="product-remove">&nbsp;</th>
			<th class="product-thumbnail">&nbsp;</th>
			<th class="product-name">Sản phẩm</th>
			<th class="product-price">Giá</th>
			<th class="product-quantity">Số lượng</th>
			<th class="product-subtotal">Tổng</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$tongdonhang = 0;
		$mproduct = new Models_MProduct;
		if(!empty($_SESSION['cart2'])){
		foreach($_SESSION['cart2'] as $k=>$v){
			 if($k>0){
			  $row = $mproduct->getOneProduct($k);
			  $tongdonhang = $tongdonhang + ($row["price"] *$v);
			 }
		?>
						<tr class="cart_item">

					<td class="product-remove">
						<a href="<?php echo BASE_URL."payment/delcart/".$k.".htm"; ?>" class="remove" title="Xóa sản phẩm này">×</a>					</td>

					<td class="product-thumbnail">
						<a href="<?php echo BASE_URL."san-pham/".$row['alias'].".html" ?>">
                        <img width="180" height="180" src="<?php echo PATH_IMG_PRODUCT.$row['images']; ?>" class="attachment-shop_thumbnail wp-post-image" alt="23"></a>					</td>

					<td class="product-name">
						<a href="<?php echo BASE_URL."san-pham/".$row['alias'].".html" ?>"><?php echo $row['title_vn'] ?></a></td>

					<td class="product-price">
						<span class="amount"><?php echo bsVndDot($row['price']); ?>&nbsp;₫</span>					</td>

					<td class="product-quantity">
						<div class="quantity">
                        <select name="soluong[<?php echo $k ?>]" >
                        <?php
						$j=0;
						for($j==1;$j<=20;$j++){ 
						?>
                        <option value="<?php echo $j ?>" <?php if($v==$j) echo 'selected'; ?>><?php echo $j; ?></option>
                        <?php } ?>
                        </select>
                        </div>
					</td>

					<td class="product-subtotal">
						<span class="amount"><?php echo bsVndDot($row['price']*$v); ?>&nbsp;₫</span>
                    </td>
				</tr>
	
    <?php }} else{ ?>
    	<tr>
        <td colspan="6">
        	<div class="alert alert-danger">Giỏ hàng trống</div>
        </td>
        </tr>
    <?php } ?>
        <tr>
			<td colspan="5">
				Phí vận chuyển:
			</td>
			<td>
				<div style="color:#AA0000" id="phivanchuyen_box">
				<?php  
				     if(isset($_SESSION['ship_price'])) echo bsVndDot($_SESSION['ship_price'])." ₫";
					 else echo "0";
				?></div>
                <input type="hidden" name="ship_price" class="ship_price_class" id="ship_price" value="
				<?php  
				     if(isset($_SESSION['ship_price'])) echo $_SESSION['ship_price'];
					 else echo "0";
				?>" />
                <script>
					$(document).ready(function(e) {
						
                        $("#city").change(function()
						{
							if($("#city").val()!='')
							{
							   var gia = <?=$tongdonhang;?>;
							   var i=$("#city").val();
							   var total=parseInt(gia)+parseInt(i);
							   //tính phí vận chuyển
							   $("#phivanchuyen_box").html(i);
							   $("#phivanchuyen_box").priceFormat({prefix: '', suffix: ' ₫', centsLimit: 0});
							   $(".ship_price_class").val(i);
							   
							   //tính tổng giá tiền
							   $("#amount").html(total);
							   $("#amount").priceFormat({prefix: '', suffix: ' ₫', centsLimit: 0});
							}
							else
							{
								var gia = <?=$tongdonhang;?>;
								$("#phivanchuyen_box").html('');
								$(".ship_price_class").val('0');
								$("#amount").html(gia);
							    $("#amount").priceFormat({prefix: '', suffix: ' ₫', centsLimit: 0});
							}
						})
                    });
				</script>
			</td>
		</tr>
    	<tr>
			<td colspan="5">
				Tổng giá:
			</td>
			<td>
				<strong><span id="amount" class="amount">
				<?php
				     if(isset($_SESSION['ship_price'])) echo bsVndDot($tongdonhang + $_SESSION['ship_price']);
					 else echo bsVndDot($tongdonhang); 
			    ?>&nbsp;₫</span></strong>
			</td>
		</tr>
	</tbody>
</table>


</form>
	<div class="form-row place-order">
		<input type="submit" class="button-alt" name="woocommerce_checkout_place_order" id="place_order" value="Đặt hàng" data-value="Đặt hàng">
		
		
	</div>

	<div class="clear"></div>
</div>



					</div>
								</div>
			</div>
		</div>
	</div>
	</div>
</div>
<div class="clear"></div>
</div>
<div class="space_10"></div>

<script type="text/javascript">
$(document).ready(function(){
	$('.quantity select').change(function(){
		$('.quantity-form').submit();
	});
	$('.button-alt').click(function(){
		if($("#city").val()=="")
		{
			alert('bạn chưa chọn khu vực');
			return false;
		}
		else
		{
		    $('.checkout').submit();
		}
	});
})
</script>