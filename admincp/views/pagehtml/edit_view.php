
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PH_TITLE_EDIT; ?></h1>
<br/>
<hr/>

<?php
if(!empty($data['error']))
{
	echo "<div id = 'error'>";
	echo "<h2>Lỗi!</h2>";
	echo "<ul>";
	echo getError($data['error']);
	echo "</ul>";
	echo "</div>";
}
?>

<form action = '<?php echo BASE_URL_ADMIN;?>pagehtml/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data">
<table>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']["title_".$vlang];?>'></td>
	</tr>
    <?php if($data['info']['Id']==15){?>
    <tr>
		<td class = 'title_td'>Mô tả(<?php echo $vlang;?>)</td>
		<td><?php getFCKeditor("description_".$vlang,stripslashes($data['info']["description_".$vlang])) ?></td>
	</tr>
    <?php } ?>
	<tr>
		<td class = 'title_td'><?php echo CONTENT;?> (<?php echo $vlang;?>)</td>
		<td><?php getFCKeditor("content_".$vlang,stripslashes($data['info']["content_".$vlang])) ?></td>
	</tr>
    
<?php
}
?>
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo STITLE;?></td>
		<td><input type = 'text' name = 'stitle' size = '50' value = '<?php echo $data['info']['stitle'] ?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo SDESCRIPTION;?></td>
		<td><textarea name = 'sdescription' rows="2" cols="50" ><?php echo $data['info']['sdescription'] ?></textarea></td>
	</tr>
		<tr>
		<td class = 'title_td'><?php echo SKEYWORD;?></td>
		<td><textarea name = 'skeyword' rows="2" cols="50" ><?php echo $data['info']['skeyword'] ?></textarea></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' name = 'editnew' value = '<?php echo G_BUTTON_EDIT;?>'>
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
			<input type = 'button' value = '<?php echo G_BUTTON_BACK;?>' onclick = "javascript:history.go(-1);">
		</th>
	</tr>	
</table>
</form>
