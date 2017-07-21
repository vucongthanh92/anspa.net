<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PAYMENT_TITLE; ?></h1>
<br/>
<form method = 'post' action = "<?php echo BASE_URL_ADMIN;?>payment/list">
<table>
	<tr>
		<td class = 'title_td'>Tìm theo tình trạng</td>
		<td>
			<select name = 'status' id="idcat">
				<option value = '0'>- - tất cả- -</option>
				<option value="1">Chưa xử lý</option>
                <option value="2">Đang xử lý </option>
                <option value="3">Đã hoàn thành</option>
                 <option value="4">Đơn hàng thất bại</option>
			</select>
		</td>
		<td>
			<input type = 'submit' value = 'Tìm' name = 'tim'>
		</td>
	</tr>
</table>
</form>
<script type="text/javascript">
$(document).ready(function(){
	$('#idcat').val('<?=$data['idcat'] ?>');
})
</script>
<br/>
<hr/>
<form action = '<?php echo BASE_URL_ADMIN;?>payment/del' method = 'post'  name="rowsForm" id="rowsForm">
<table>
	<caption>Danh sách</caption>
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>STT</th>
		<th><?php echo PM_HOTEN; ?></th>
		<th><?php echo PM_DIACHI; ?></th>
		<th>Email</th>
		<th>Tel</th>
		<th>Ngày đặt hàng</th>
        <th>Tình trạng</th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data['info'])){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '9' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		$i=0;
		while ($item=mysql_fetch_assoc($data['info']))
		{
			$i++;
		?>
		<tr <?php if($item["view"] == 0) echo "style='font-weight:bold'"; ?>>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
			<td ><?php echo $i; ?></td>  
			<td><?php echo $item['fullname']; ?></td>
            
			<td><?php echo $item['deliveryaddress']; ?></td>
			<td><?php echo $item['email']; ?></td>
			<td><?php echo $item['tel'];?></td>
			<td><?php echo date("d-m-Y",strtotime($item['date']));?></td>
            <td align = 'center'>
			<?php 
				if($item['status']==1) echo "<span style='color:#000'>Chưa xử lý</a>";
				if($item['status']==2) echo "<span style='color:#07665c'> Đang xử lý </a>";
				if($item['status']==3) echo "<span style='color:#076a02'>Đã hoàn thành</a>";
				if($item['status']==4) echo "<span style='color:#F00'>Đơn hàng thất bại</a>";
			?>
			</td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>payment/edit/<?php echo $item['Id'];?>' title = 'Chi tiết'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."payment/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
		</tr>
		<?php
		}
	}
	?>
</table>
<?php 
if(isset($data['page']) && $data['page'] != "")
{
	echo "<hr/>Trang: ";
	echo $data['page'];
}
?>
<hr/>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)'>Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'>Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /></A>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</form>
<hr/>
