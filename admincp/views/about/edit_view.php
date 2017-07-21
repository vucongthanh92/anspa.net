<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Sửa bài viết giới thiệu</h1>
<br/>
<hr/>
<script type="text/javascript">
<!--
function checkform(){

	var frm = document.frm;
	if(frm.title_vn.value == ""){
		alert("Vui lòng nhận tiêu đề tin");
		frm.title_vn.focus();
		return false;
	}
}
//-->
</script>
<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>about/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">
<table>
 
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' value = '<?php echo $data['info']['title_'.$vlang];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo DESCRIPTION;?><a href = 'javascript:getcontent("description_<?php echo $vlang;?>","description<?php echo $vlang;?>")'>Click</a></td>
		<td><?php getFCKeditor("description_".$vlang,stripslashes($data['info']["description_".$vlang])); ?></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo CONTENT;?><a href = 'javascript:getcontent("content_<?php echo $vlang;?>","content<?php echo $vlang;?>")'>Click</a></td>
		<td><?php getFCKeditor("content_".$vlang,stripslashes($data['info']["content_".$vlang])); ?></td>
	</tr>
<?php
}
?>
	<tr>
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'images'></td>
	</tr>

	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'];?>'></td>
	</tr>

	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo "checked";?>></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
