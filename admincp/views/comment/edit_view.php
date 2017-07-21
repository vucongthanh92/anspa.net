<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Sửa Ý kiến khách hàng</h1>
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
<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>comment/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">
<table>
	<tr>
		<td class = 'title_td'>Người gửi(<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'name' value = '<?php echo $data['info']['name'];?>' size = '50'></td>
	</tr>
    <tr>
		<td class = 'title_td'>Email</td>
		<td><input type = 'text' name = 'email' value = '<?php echo $data['info']['email'];?>' size = '50'></td>
	</tr>
     <tr>
		<td class = 'title_td'>Điện thoại</td>
		<td><input type = 'text' name = 'phone' value = '<?php echo $data['info']['phone'];?>' size = '50'></td>
	</tr>
 
	<tr>
		<td class = 'title_td'><?php echo CONTENT;?></td>
		<td><?php getFCKeditor("content_vn",stripslashes($data['info']["content_vn"])); ?></td>
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
