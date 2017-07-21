<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Flash</h1>
<br/>

<hr/>
<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>flash/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>

<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>flash/del' method = 'post'  name="rowsForm" id="rowsForm">
<table>
	<caption>Danh sách</caption>
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th>File</th>
		<th>Ảnh</th>
		<th>Vị trí</th>
		<th>Sắp xếp</th>
        <th><?php echo G_LOCK; ?></th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data)){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '7' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		if(!empty($data['info'])){
			foreach($data['info'] as $item)
			{
			?>
				<tr>
					<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
					<td><?php echo $item['Id']; ?></td>
					<td><a href = '<?php echo BASE_URL;?>/data/Flash/<?php echo $item['file_vn']; ?>'><?php echo $item['file_vn']; ?></a></td>
					<td>
					<?php if($item['style'] == 1){?>
						<embed width="100" height="50" menu="true" loop="true" play="true" src="/data/Flash/<?=$item['file_vn'];?>" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
					<?php }else{?>
						<img src = "<?=BASE_URL ?>/data/Flash/<?=$item['file_vn']?>" height="50">
					<?php }?>
					</td>
					<td>
						<?php 
						if($item['location'] == 1) echo 'Logo';
						if($item['location'] == 2) echo 'Banner home top';
						if($item['location'] == 3) echo 'Slideshow ';
						if($item['location'] == 4) echo 'Banner left';
						if($item['location'] == 5) echo 'Banner home bottom';
						if($item['location'] == 6) echo 'slogan';
						?>
					</td>
					<td align = 'center'><input type = 'text' size = '1' name = 'sort[<?php echo $item['Id'];?>]' value = "<?php echo $item['sort'];?>" style = 'text-align:center;' /></td>
					<td align = 'center'>
					<?php 
                    if($item['ticlock'] == "1"){
                        echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_FLASH."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."visible.gif'></a></div>";
                    }else{
                        echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_FLASH."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."invisible.gif'></a></div>"; 
                    }
                    ?>
                    </td>
                    <td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>flash/edit/<?php echo $item['Id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
					<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."flash/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
				</tr>
			<?php
			}
		}
	}
	?>
</table>
<hr/>

<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>flash/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)'>Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'>Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /></A>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>flash/save')"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /></A>

</form>
<hr/>
