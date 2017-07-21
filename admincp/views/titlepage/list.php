<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> CÁC TIÊU ĐỀ TRANG</h1>
<br/>
<hr/>

<form name = "frm1" action = '<?php echo BASE_URL_ADMIN;?>titlepage/list' method = 'post' enctype = "multipart/form-data">
<table>
 <tr>
    <th colspan="2" height="10">Thẻ Meta</th>
    </tr>
    <tr>
		<td class = 'title_td'>Title</td>
		<td><input type = 'text' name = 'title_page' size = '80' value = "<?php echo $data['title_page'];?>"></td>
	</tr>
    <tr>
		<td class = 'title_td'>Meta Description</td>
		<td><textarea name = 'description_page' style="width:400px; height:110px"  ><?php echo $data['description_page'];?></textarea></td>
	</tr>
    <tr>
		<td class = 'title_td'>Meta Keyword</td>
		<td><textarea name = 'keyword_page' style="width:400px; height:110px" ><?php echo $data['keyword_page'];?></textarea></td>
	</tr>
   
	<tr>
		<th colspan="2">Hỗ trợ trực tuyến</th>
	</tr>
	<tr>
		<td class = 'title_td'>Phụ trách bán lẻ</td>
		<td>
			Tên : <input type = 'text' name = 'name1' size = '20' value = "<?php echo $data['name1'];?>">
			Skype : <input type = 'text' name = 'phone1' size = '20' value = "<?php echo $data['phone1'];?>">
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Phụ trách bán buôn </td>
		<td>
			Tên : <input type = 'text' name = 'name2' size = '20' value = "<?php echo $data['name2'];?>">
			Skype : <input type = 'text' name = 'phone2' size = '20' value = "<?php echo $data['phone2'];?>">
		</td>
	</tr>
 <?php /*
	<tr>
		<td class = 'title_td'>Nhân viên 3 </td>
		<td>
			Yahoo : <input type = 'text' name = 'yahoo3' size = '20' value = "<?php echo $data['yahoo3'];?>">
			Điện thoại: <input type = 'text' name = 'phone3' size = '20' value = "<?php echo $data['phone3'];?>">
			Tên: <input type = 'text' name = 'name3' size = '20' value = "<?php echo $data['name3'];?>">
		</td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Nhân viên 4 </td>
		<td>
			Yahoo : <input type = 'text' name = 'yahoo4' size = '20' value = "<?php echo $data['yahoo4'];?>">
			Điện thoại: <input type = 'text' name = 'phone4' size = '20' value = "<?php echo $data['phone4'];?>">
			Tên: <input type = 'text' name = 'name4' size = '20' value = "<?php echo $data['name4'];?>">
		</td>
	</tr>
	*/ ?>
    <tr>
		<td class = 'title_td'>Hotline   </td>
		<td><input type = 'text' name = 'hotline1' size = '50' value = "<?php echo $data['hotline1'];?>"></td>
	</tr>
   <?php /* ?> <tr>
		<td class = 'title_td'>Hotline 2   </td>
		<td><input type = 'text' name = 'hotline2' size = '50' value = "<?php echo $data['hotline2'];?>"></td>
	</tr><?php */?>
    <tr>
		<td class = 'title_td'>Email gửi liên hệ</td>
		<td><input type = 'text' name = 'emaillienhevn' size = '50' value = "<?php echo $data['emaillienhe_vn'];?>"></td>
	</tr>
    <tr>
		<th colspan = '3' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'save'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>
</table>
</form>


