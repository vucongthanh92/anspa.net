<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Thêm mới giới thiệu</h1>

<br/>

<hr/>


<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>about/add' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">

<table>
<?php

foreach($config_lang as $klang => $vlang)

{

?>

	<tr>

		<td class = 'title_td'><?php echo TITLE;?></td>

		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50'></td>

	</tr>

	<tr>

		<td class = 'title_td'><?php echo DESCRIPTION;?></td>

		<td><?php getFCKeditor("description_".$vlang); ?></div></td>

	</tr>

	<tr>

		<td class = 'title_td'><?php echo CONTENT;?></td>

		<td><?php getFCKeditor("content_".$vlang); ?></td>

	</tr>



<?php

}

?>

	<tr>

		<td class = 'title_td'><?php echo IMAGES;?></td>

		<td><input type = 'file' name = 'images'></td>

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

