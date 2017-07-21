<img src = '<?php echo ADMIN_PATH_IMG?>s_db.png'>&nbsp;<b>TÀI KHOẢN ĐĂNG NHẬP</b>
<hr>
<br/>
<div id = 'noidung'>

<img src = '<?php echo ADMIN_PATH_IMG?>b_insrow.png'/>&nbsp;<a href = '<?php echo BASE_URL_ADMIN?>user/add'>Thêm mới</a>
<hr/>

<form action = 'index.php?mod=user&act=del' method = 'post'  name="rowsForm" id="rowsForm">
<table>
	<caption>Danh sách tài khoản</caption>
	<th><input type="checkbox" name="Check_ctr" value="yes" onClick="Check(document.rowsForm.check_list)"></th>
	<th>ID</th>
	<th>Username</th>
	<th>Email</th>
	<th colspan = '2'>Hành động</th>
	
	<?php
	if(!empty($data))
	{
		foreach($data as $item)
		{
		?>
		<tr>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?=$item['Id']?>"><br></td>
			<td><?php echo $item['Id']?></td>
			<td><?php echo $item['username']?></td>
			<td><?php echo $item['email']?></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN?>user/edit/<?php echo $item['Id']?>'><img src = '<?php echo ADMIN_PATH_IMG?>b_edit.png' title = 'Edit'></a></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN?>user/del/<?php echo $item['Id']?>' alt = 'Delete'><img src = '<?php echo ADMIN_PATH_IMG?>b_drop.png' title = 'Delete'></a></td>
		</tr>
		<?php
		}
	}
	?>
</table>
<img src = '<?php echo ADMIN_PATH_IMG?>arrow_ltr.png'>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)'>Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'>Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<A href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE?>',document.rowsForm.check_list)"><img class="icon" src="<?php echo ADMIN_PATH_IMG?>/b_drop.png" alt="Delete" title="Delete item selected" /></A>
</form>

<hr/>
<img src = '<?php echo ADMIN_PATH_IMG?>b_insrow.png'/>&nbsp;<a href = '<?php echo BASE_URL_ADMIN?>user/add'>Thêm mới</a>

</div>