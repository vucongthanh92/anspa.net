<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PAYMENT_DETAIL_TITLE; ?></h1>
<br/>
<br/>
<form action="<?=BASE_URL_ADMIN."payment/edit/".$_GET['id'] ?>" method="post">
<table>
	<tr><th colspan = '2'>Thông tin khách hàng</th></tr>
    <tr>
		<td class = 'title_td'>Tình trạng:</td>
		<td><select name="status" class="select_box">
        	<option <?php  if($data['cus']['status']==1) echo "selected='selected'"; ?> value="1">Chưa xử lý</option>
            <option <?php  if($data['cus']['status']==2) echo "selected='selected'"; ?> value="2">Đang xử lý</option>
            <option <?php  if($data['cus']['status']==3) echo "selected='selected'"; ?> value="3">Đã hoàn thành</option>
            <option <?php  if($data['cus']['status']==4) echo "selected='selected'"; ?> value="4">Đơn hàng thất bại</option>
        </select></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo BG_HOTEN;?></td>
		<td><?php echo $data['cus']['fullname'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Địa chỉ giao hàng</td>
		<td><?php echo $data['cus']['deliveryaddress'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Email</td>
		<td><?php echo $data['cus']['email'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Tel</td>
		<td><?php echo $data['cus']['tel'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ngày đặt hàng</td>
		<td><?php echo date("d-m-Y",strtotime($data['cus']['date']));?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Phương thức thanh toán</td>
		<td><?php if($data['cus']['methodpay']==1)
				echo "Chuyển khoản qua ngân hàng";
				else echo "Thanh toán trực tiếp";
			
		?></td>
	</tr>
    <tr>
		<td class = 'title_td'>Xử lý</td>
		<td><?php if($data['cus']['xuly']==1) echo 'Đã xử lý'; else echo 'Chưa xử lý'; ?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ghi chú</td>
		<td><textarea style="width:400px; height:150px" name="note"><?php echo $data['cus']['note'];?></textarea></td>
	</tr>
    <tr>
    <td align="center" colspan="2">
    	<input type="submit" value="Lưu lại" name="btnsave" />
        <input type="reset" value="Làm lại" />
        
    </td>
    </tr>
</table>
</form>
<br/>
<b>Giỏ hàng</b>
<br/>
<table>
	<tr>
		<th>STT</th>
		<th>Tên sản phẩm</th>
		<th>Hình sản phẩm</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
		<th>Tổng giá</th>
	</tr>
	<?php
	$i=0;
	$mproduct = new Models_MProduct;
	if(!empty($data['cart']))
	{
		$tongcong = 0;
		foreach($data['cart'] as $item)
		{
			$info = $mproduct-> getOneProduct($item['idpro']);
			$price = $info['price'];
			$tong = $price *$item['amount'];
			$tongcong += $tong;
			$i++;
		?>
		<tr>
			<td align = 'center'><?php echo $i;?></td>
			<td><?php echo $info['title_vn'];?></td>
			<td><img src = '<?php echo BASE_URL;?>/data/Product/<?php echo $info['images']; ?>' width = '60'></td>
			<td align = 'center'><?php echo $item['amount'];?></td>
			<td align = 'right'><?php echo bsVndDot($price);?></td>
			<td align = 'right'><?php echo bsVndDot($tong);?></td>
		</tr>
		<?php 
		} 
	}
	?>
	<tr>
		<td colspan = '5' align = 'right'><b>Tổng cộng</b></td>
		<td align = 'right'><b><?php echo bsVndDot($tongcong);?> VNĐ</b></td>
	</tr>
</table>