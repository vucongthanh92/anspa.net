<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PRODUCT_TITLE; ?></h1>
<br/>
<hr/>

<form method = 'post' action = "<?php echo BASE_URL_ADMIN;?>product/list">
<?php /*?><table>
	<tr>
		<td class = 'title_td'>Tìm theo chủ đề</td>
		<td>
			<select name = 'id'>
				<option value = ''>- - Chọn chủ đề - -</option>
			<?php
				echo $tmenu = TreeCat($data['cat'],0,"","","--");
			?>
			</select>
		</td>
		<td>
			<input type = 'submit' value = 'Tìm' name = 'tim'>
		</td>
	</tr>
</table><?php */?>
</form>

<br/>
<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>product/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>
<hr/>
<form action = '<?php echo BASE_URL_ADMIN;?>product/del' method = 'post'  name="rowsForm" id="rowsForm">
<table>
	<caption>Danh sách</caption>
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th><?php echo TITLE; ?></th>
        <th>Mã Sản Phẩm</th>
		<th><?php echo IMAGES; ?></th> 
		<th><?php echo PRICE; ?></th>
		<th><?php echo SORT; ?></th>
         <th>Home</th>
		<th><?php echo G_LOCK; ?></th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data['info'])){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '11' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		foreach($data['info'] as $item)
		{
		?>
		<tr>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
			<td><?php echo $item['Id']; ?></td>
			<td><?php echo $item['title_vn']; ?></td>
            <td><?php echo $item['code_pro']; ?></td>
			<td><img src = '<?php echo BASE_URL;?>/data/Product/<?php echo $item['images']; ?>' width = '60'></td>
			<td align = 'center'><input type = 'text' size = '15' name = 'price[<?php echo $item['Id'];?>]' value = "<?php echo $item['price']; ?>"   />VNĐ</td>
			<td align = 'center'><input type = 'text' size = '1' name = 'sort[<?php echo $item['Id'];?>]' value = "<?php echo $item['sort'];?>" style = 'text-align:center;' /></td>
             <td align = 'center'>
			<?php 
			if($item['ticnew'] == "1"){
				echo "<div id = 'ticnew".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"ticnew\",\"".$item['Id']."\",\"0\",\"ticnew".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."visible.gif'></a></div>";
			}else{
				echo "<div id = 'ticnew".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"ticnew\",\"".$item['Id']."\",\"1\",\"ticnew".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."invisible.gif'></a></div>"; 
			}
			?>
			</td>		
			<td align = 'center'>
			<?php 
			if($item['ticlock'] == "1"){
				echo "<div id = 'ticlock".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"ticlock".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."visible.gif'></a></div>";
			}else{
				echo "<div id = 'ticlock".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_PRODUCT."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"ticlock".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."invisible.gif'></a></div>"; 
			}
			?>
			</td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>product/edit/<?php echo $item['Id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."product/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
		</tr>
		<?php
		}
	}
	?>
</table>
<?php 
echo "<hr/><span style = 'color:blue;font-weight:900;'>Tổng số:&nbsp;".$data['total'] . "</span> || ";
if(isset($data['page']) && $data['page'] != "")
{
	echo "Trang: ";
	echo $data['page'];
}
?>
<hr/>
<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>product/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)'>Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'>Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /></A>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>product/save')"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /></A>
</form>
<hr/>
