<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Thêm mới ý kiến khách hàng</h1>
<br/>
<hr/>
<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>comment/add' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">
<table>
	<tr>
		<td class = 'title_td'>Người gửi</td>
		<td><input type = 'text' name = 'name' value = '' size = '50'></td>
	</tr>
    <tr>
		<td class = 'title_td'>Email(<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'email' value = '' size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Điện thoại</td>
		<td><input type = 'text' name = 'phone' value = '' size = '50'></td>
	</tr>
    
	<tr>
		<td class = 'title_td'><?php echo CONTENT;?></td>
		<td><?php getFCKeditor("content_vn"); ?></td>
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

