<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PAYMENT_TITLE; ?></h1>
<br/>
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
        <th>Xử lý</th>
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
		foreach($data['info'] as $item)
		{
			$i++;
		?>
		<tr <?php if($item["view"] == 0) echo "style='font-weight:bold'"; ?>>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
			<td ><?php echo $i; ?></td>  
			<td><?php echo $item['fullname']; ?></td>
            
			<td><?php echo $item['address']; ?></td>
			<td><?php echo $item['email']; ?></td>
			<td><?php echo $item['tel'];?></td>
			<td><?php echo date("d-m-Y",strtotime($item['date']));?></td>
            <td align = 'center'>
			<?php 
			if($item['xuly'] == "1"){
				echo "<div id = 'xuly".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_CUSTOMER."\",\"xuly\",\"".$item['Id']."\",\"0\",\"xuly".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."visible.gif'></a></div>";
			}else{
				echo "<div id = 'xuly".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_CUSTOMER."\",\"xuly\",\"".$item['Id']."\",\"1\",\"xuly".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."invisible.gif'></a></div>"; 
			}
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
