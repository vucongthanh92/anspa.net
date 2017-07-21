<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Danh Mục Sản Phẩm</h1>
<br/>
<hr/>
<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>catelog/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>catelog/del' method = 'post'  name="rowsForm" id="rowsForm">
<table>
	<caption>Danh sách</caption>
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th><?php echo TITLE; ?></th>
		<th>Hình Ảnh</th>
		<th><?php echo SORT; ?></th>
        <th>Trang Chủ</th>
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
		function TreeCatnews($pid,$data,$text=" __ "){
			foreach($data['info'] as $item)
			{
				if($item['parentid'] == $pid){
					if($pid == "0"){ $cls = "color:red;font-weight:900;";}else{$cls="";}
			?>
				<tr>
					<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
					<td><?php echo $item['Id']; ?></td>
					<td><?php echo $text.$item['title_vn']; ?></td>
					<td align="center"><?php 
					     if($item['images']!="")
						 echo "<img src='".BASE_URL."data/Catelog/".$item['images']."' style='width:60px'/>";?></td>
					<td align='center'><input style="text-align:center" type='text' size='1' name='sort[<?php echo $item['Id'];?>]' value="<?php echo $item['sort'];?>"/>
                    </td>
                    <td align = 'center'>
					<?php 
                    if($item['home'] == "1"){
                        echo "<div id = 'home".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_CATELOG."\",\"home\",\"".$item['Id']."\",\"0\",\"home".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."visible.gif'></a></div>";
                    }else{
                        echo "<div id = 'home".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_CATELOG."\",\"home\",\"".$item['Id']."\",\"1\",\"home".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."invisible.gif'></a></div>"; 
                    }
                    ?>
                    </td>
                </td>
					<td align = 'center'>
					<?php 
					if($item['ticlock'] == "1"){
						echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_CATELOG."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."visible.gif'></a></div>";
					}else{
						echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_CATELOG."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."invisible.gif'></a></div>"; 
					}
					?>
					</td>
					<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>catelog/edit/<?php echo $item['Id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
					<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."catelog/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
				</tr>
			<?php
					TreeCatnews($item['Id'],$data,$text."____ ");
				}
			}
			return;
		}
	
		TreeCatnews(0,$data," ");
	}
	}
	?>
</table>
<hr/>
<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>catelog/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)'>Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'>Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /></A>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>catelog/save')"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /></A>
</form>
<hr/>
