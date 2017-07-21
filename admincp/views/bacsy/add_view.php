<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Thêm bác sỹ</h1>

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

<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>bacsy/add' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">
<table>

    <tr>
		<td class = 'title_td'>Danh Mục</td>
		<td>
        <select name="parentid">
              <option value="">- - chọn danh mục - -</option>
              <?php
			      $sql="select * from mn_bacsy where ticlock='0' and parentid='0' order by Id asc";
				  $ds=mysql_query($sql) or die(mysql_error());
				  while($row=mysql_fetch_assoc($ds)) {
			  ?>
              <option value="<?=$row['Id']?>"><?=$row['title_vn']?></option>
              <?php } ?>
        </select>
        </td>
	</tr>
    
	<tr>
		<td class = 'title_td'><?php echo TITLE;?></td>
		<td><input type = 'text' name = 'title_vn' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Giá</td>
		<td><input type = 'text' name = 'price' onkeyup="this.value = FormatNumber(this.value);"> VNĐ</div></td>
	</tr>

	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10'></td>
	</tr>

	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1'></td>
	</tr>

	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>

</form>

