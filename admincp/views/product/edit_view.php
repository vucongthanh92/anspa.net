<script type = 'text/javascript'>
function multipleselect(){
	frm = document.frm1;
	for(i=0; i<(frm.idapp).length;i++){
		frm.idapp[i].selected = true;
	}

	for(i=0; i<(frm.idnhan).length;i++){
		frm.idnhan[i].selected = true;
	}
}
</script>
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PRODUCT_EDIT_TITLE; ?></h1>
<br/>
<hr/>
<form name = "frm1" action = '<?php echo BASE_URL_ADMIN;?>product/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data" onsubmit = "javascript: multipleselect();">
<table>
	<tr>
		<td class = 'title_td'><?php echo PARENTID;?></td>
		<td>
			<select name = 'idcat'>
				<option value = ''>- - Chọn nhóm sản phẩm - -</option>
				<?php
                $mcatelog = new Models_MCatelog;
                $ldata = $mcatelog->listdata();
                echo $tmenu = TreeCat($ldata,0,"",$data['info']['idcat'],"--");
                ?>
			</select>
		</td>
	</tr>
    
	<tr>
		<td class = 'title_td'>Tên sản phẩm</td>
		<td><input type = 'text' name = 'title_vn' value = '<?php echo $data['info']['title_vn'];?>' size = '50'></td>
	</tr>
	
    <tr>
		<td class = 'title_td'>Mã sản phẩm</td>
		<td><input type = 'text' name = 'code_pro' value="<?php echo $data['info']['code_pro'];?>" size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Alias</td>
		<td><input type = 'text' name = 'alias' value = '<?php echo $data['info']['alias'];?>' size = '50'></td>
	</tr>
    <tr>
		<td class = 'title_td'><?php echo PRICE;?></td>
		<td><input type = 'text' name = 'price' value = '<?php echo bsVndDot($data['info']['price']);?>' 
            onkeyup="this.value = FormatNumber(this.value);"> VNĐ</td>
	</tr>
    <tr>
		<td class = 'title_td'>Mô tả</td>
		<td><textarea style="width:580px; height:120px;" name="description_vn"><?php echo ($data['info']['description_vn']);?></textarea></td>
	</tr>
	<tr>
		<td class = 'title_td'>Chi tiết</td>
		<td><?php getFCKeditor("content_vn",stripslashes($data['info']["content_vn"]),350); ?></td>
	</tr>
     
	<?php if($data['info']['images'] != ""){?>
	<tr>
		<td>&nbsp;</td>
		<td>
			<div id = "images">
			<img src = "<?php echo BASE_URL ?>/data/Product/<?php echo $data['info']['images']?>" height = "50">
			<a href = "javascript: delFlash('<?php echo TBL_PRODUCT?>','images',<?php echo $data['info']['Id']?>,'<?php echo $data['info']['images'];?>','images','<?php echo BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a>
			</div>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'images' size = "50"></td>
	</tr>
   
	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'];?>'></td>
	</tr>
     
    <tr>
		<td class = 'title_td'>Mới</td>
		<td><input type = 'checkbox' name = 'ticnew' value = '1' <?php if($data['info']['ticnew'] == 1) echo "checked";?>></td>
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
