
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Thêm nhóm thiết bị</h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>nhomthietbi/add' method = 'post' enctype = "multipart/form-data">
<table>
    
    <tr>
		<td class = 'title_td'>Danh Mục </td>
		<td>
        <select name="parentid">
             <option value="">- - chọn danh mục - -</option>
             <?php
			     $sql="select * from mn_nhomthietbi where parentid='0'";
				 $ds=mysql_query($sql) or die(mysql_error());
				 while($row=mysql_fetch_assoc($ds)) {
			 ?>
             <option value="<?=$row['Id']?>"><?=$row['title_vn']?></option>
             <?php } ?>
        </select>
        </td>
	</tr>
    
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> </td>
		<td><input type = 'text' name = 'title_vn' size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Phí Vận Chuyển </td>
		<td><input type = 'text' name = 'price' onkeyup="this.value = FormatNumber(this.value);"> VNĐ</div></td>
	</tr>
    
	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1'></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
