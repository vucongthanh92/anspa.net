<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo PRODUCT_ADD_TITLE; ?></h1>
<br/>
<hr/>


<form name = "frm1" action = '<?php echo BASE_URL_ADMIN;?>product/add' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'><?php echo CATELOG_TITLE;?></td>
		<td>
			<select name = 'idcat' style = 'width:200px;' id="idcat">
				<option value = ''>- - Chọn nhóm sản phẩm - -</option>
			<?php
			$mcatelog = new Models_MCatelog;
			$ldata = $mcatelog->listdata();
			echo $tmenu = TreeCat($ldata,0,"","","--");
			?>
			</select>
            <script type="text/javascript">
			$(document).ready(function(){
				$("#idcat").val("<?php echo $_GET['id'] ?>");	
			})
			</script>
		</td>
	</tr>

	<tr>
		<td class = 'title_td'>Tên sản phẩm</td>
		<td><input type = 'text' name = 'title_vn' size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Mã sản phẩm</td>
		<td><input type = 'text' name = 'code_pro' size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Hãng sản xuất</td>
		<td><input type = 'text' name = 'code_pro' size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Alias</td>
		<td><input type = 'text' name = 'alias' size = '50'></td>
	</tr>
    <tr>
		<td class = 'title_td'><?php echo PRICE;?></td>
		<td><input type = 'text' name = 'price' onkeyup="this.value = FormatNumber(this.value);"> VNĐ</td>
	</tr> 
 	 
    <tr>
		<td class = 'title_td'>Mô tả</td>
		<td><textarea style="width:580px; height:120px;" name="description_vn"></textarea></td>
	</tr>
    <tr>
		<td class = 'title_td'>Chi tiết</td>
		<td><?php getFCKeditor("content_vn","",350); ?></td>
	</tr>

	<tr>
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'images' size = "50"></td>
	</tr>
  	 
	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10'></td>
	</tr>
    <tr>
		<td class = 'title_td'>Home</td>
		<td><input type = 'checkbox' name = 'ticnew' value = '1' ></td>
	</tr>
    
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo STITLE;?></td>
		<td><input type = 'text' name = 'stitle' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo SDESCRIPTION;?></td>
		<td><textarea name = 'sdescription' rows="2" cols="50" ></textarea></td>
	</tr>
		<tr>
		<td class = 'title_td'><?php echo SKEYWORD;?></td>
		<td><textarea name = 'skeyword' rows="2" cols="50" ></textarea></td>
	</tr>	
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>
</table>
</form>
