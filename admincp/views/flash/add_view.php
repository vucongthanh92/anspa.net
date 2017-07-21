
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Thêm banner</h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>flash/add' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'>Loại file</td>
		<td>
		<select name = "style">
			<option value = '1'>Flash</option>
			<option value = '2'>Ảnh</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Vị trí</td>
		<td>
		<select name = "location">
			<option value = '1'>Logo</option>
			<option value = '2'>Banner home top</option>
            <option value = '3'>Slideshow</option>
            <option value = '4'>Banner Left</option>
            <option value = '5'>Banner home bottom</option>
            <option value = '6'>Slogan</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>File</td>
		<td><input type = 'file' name = 'file_vn' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Kích thước</td>
		<td>Rộng: <input type = 'text' name = 'width' size = '15'> Cao: <input type = 'text' name = 'height' size = '15'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Link</td>
		<td><input type = 'text' name = 'link' size = '60'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Sắp xếp</td>
		<td><input type = 'text' name = 'sort' size = '10'></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
