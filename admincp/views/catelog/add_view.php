
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Thêm Danh Mục Sản Phẩm</h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>catelog/add' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'><?php echo PARENTID;?></td>
		<td>
			<select name = 'parentid'>
				<option value = ''>- - Chọn nhóm sp cha - -</option>
			<?php
			$mcatelog = new Models_MCatelog;
			$ldata = $mcatelog->listdata();
			echo $tmenu = TreeCat($ldata,0,"","","--");
			?>
			</select>&nbsp;<i style = 'color:red;'>(<?php echo LUUYNHOMSP;?>)</i>
		</td>
	</tr>

	<tr>
		<td class = 'title_td'><?php echo TITLE;?></td>
		<td><input type='text' name='title_vn' size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Alias</td>
		<td><input type = 'text' name = 'alias' size = '50'></td>
	</tr>

    
    <tr>
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'images' size = "50"></td>
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
		<td class = 'title_td'><?php echo STITLE;?></td>
		<td><input type = 'text' name = 'stitle' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo SDESCRIPTION;?></td>
		<td><textarea name = 'sdescription' rows="2" cols="50" ></textarea></td>
	</tr>
		<tr>
		<td class = 'title_td'><?php echo SKEYWORD;?></td>
		<td><textarea name = 'skeyword' rows="2" cols="50" ></textarea></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
