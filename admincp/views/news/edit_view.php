<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo NEWS_EDIT_TITLE; ?></h1>
<br/>
<hr/>
<script type="text/javascript">
<!--
function checkform(){

	var frm = document.frm;
	if(frm.idcat.value == ""){
		alert("Vui lòng chọn chủ đề");
		return false;
	}
	if(frm.title_vn.value == ""){
		alert("Vui lòng nhận tiêu đề tin");
		frm.title_vn.focus();
		return false;
	}
}
//-->
</script>
<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>news/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">
<table>
 
	<tr>
		<td class = 'title_td'><?php echo PARENTID;?></td>
		<td>
			<select name = 'idcat'>
				<option value = ''>- - Chọn chủ đề - -</option>
			<?php
			$mcatnews = new Models_MCatnews;
			$ldata = $mcatnews->listdata();
			echo $tmenu = TreeCat($ldata,0,"",$data['info']['idcat'],"--");
			?>
			</select>
		</td>
	</tr>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' value = '<?php echo $data['info']['title_'.$vlang];?>' size = '50'></td>
	</tr>
   <tr>
		<td class = 'title_td'>Alias (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'alias' value = '<?php echo $data['info']['alias'];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo DESCRIPTION;?><a href = 'javascript:getcontent("description_<?php echo $vlang;?>","description<?php echo $vlang;?>")'>Click</a></td>
		<td><?php getFCKeditor("description_".$vlang,stripslashes($data['info']["description_".$vlang]),500); ?></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo CONTENT;?><a href = 'javascript:getcontent("content_<?php echo $vlang;?>","content<?php echo $vlang;?>")'>Click</a></td>
		<td><?php getFCKeditor("content_".$vlang,stripslashes($data['info']["content_".$vlang]),500); ?></td>
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
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
