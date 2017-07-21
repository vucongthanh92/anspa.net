<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Sửa bác sỹ</h1>
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
<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>bacsy/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">
<table>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?></td>
		<td><input type = 'text' name = 'title_vn' value = '<?php echo $data['info']['title_vn'];?>' size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Giá</td>
		<td><input type='text' value="<?php echo $data['info']['price'];?>" name='price' onkeyup="this.value = FormatNumber(this.value);"> VNĐ</div></td>
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
