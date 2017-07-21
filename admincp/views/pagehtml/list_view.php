<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PH_TITLE; ?></h1>
<br/>
<hr/>
<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>pagehtml/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>pagehtml/del' method = 'post'  name="rowsForm" id="rowsForm">
<table>
	<caption>Danh sách</caption>
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th><?php echo TITLE; ?></th>
		<th><?php echo G_LOCK; ?></th>
		<th colspan = '1'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data)){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '6' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		foreach($data as $item)
		{
	?>
		<tr>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
			<td><?php echo $item['Id']; ?></td>
			<td><?php echo $item['title_vn']; ?></td>
			<td align = 'center'>
			<?php 
			if($item['ticlock'] == "1"){
				echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_PAGEHTML."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"".BASE_URL_ADMIN."\");'><img src = '".ADMIN_PATH_IMG."visible.gif'></a></div>";
			}else{
				echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_PAGEHTML."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"".BASE_URL_ADMIN."\");'><img src = '".ADMIN_PATH_IMG."invisible.gif'></a></div>"; 
			}
			?>
			</td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>pagehtml/edit/<?php echo $item['Id'];?>'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
			<!--<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."pagehtml/del/".$item['Id'];?>' onclick = 'javascript:thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>-->
		</tr>
	<?php
		}
	}
	?>
</table>
<hr/>
<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>pagehtml/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)'>Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'>Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Delete item selected" /></A>
</form>
<hr/>
