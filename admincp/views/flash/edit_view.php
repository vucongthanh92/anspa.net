<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Sửa banner</h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>flash/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'>Loại file</td>
		<td>
		<select name = "style">
			<option value = '1' <?php if($data['info']['style'] == 1) echo 'selected';?>>Flash</option>
			<option value = '2'  <?php if($data['info']['style'] == 2) echo 'selected';?>>Ảnh</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Vị trí</td>
		<td>
		<select name = "location">
			<option value = '1' <?php if($data['info']['location'] == 1) echo 'selected';?>>Logo</option>
			<option value = '2' <?php if($data['info']['location'] == 2) echo 'selected';?>>Banner home top</option>
            <option value = '3' <?php if($data['info']['location'] == 3) echo 'selected';?>>Slideshow</option>
            <option value = '4' <?php if($data['info']['location'] == 4) echo 'selected';?>>Banner left</option>
            <option value = '5' <?php if($data['info']['location'] == 5) echo 'selected';?>>Banner home Bottom</option>
            <option value = '6' <?php if($data['info']['location'] == 6) echo 'selected';?>>Slogan</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>File</td>
		<td><input type = 'file' name = 'file_vn' size = '50'></td>
	</tr>
	<?php if($data['info']['file_vn'] != ""){?>
	<tr>
		<td>&nbsp;</td>
		<td><div id = "file_vn">
		<p><embed width="<?=$data['info']['width']?>" height="<?=$data['info']['height']?>" menu="true" loop="true" play="true" src="/data/Flash/<?php echo $data['info']['file_vn'];?>" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed></p>
		&nbsp;&nbsp;&nbsp;
		<a href = "javascript: delFlash('<?php echo TBL_FLASH?>','file_vn',<?php echo $data['info']['Id']?>,'<?php echo $data['info']['file_vn'];?>','file_vn','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a></div>
		</td>
	</tr>
	<?php }?>
	<tr>
		<td class = 'title_td'>Kích thước</td>
		<td>Rộng: <input type = 'text' name = 'width' size = '15'  value = '<?php echo $data['info']['width'];?>'> Cao: <input type = 'text' name = 'height' size = '15'  value = '<?php echo $data['info']['height'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Link</td>
		<td><input type = 'text' name = 'link' size = '60'  value = '<?php echo $data['info']['link'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Sắp xếp</td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'];?>'></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = "hidden" >
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
