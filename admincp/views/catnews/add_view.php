
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo CATNEWS_ADD_TITLE; ?></h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>catnews/add' method = 'post' enctype = "multipart/form-data">
<table>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50'></td>
	</tr>
<?php
}
?>
	<tr>
		<td class = 'title_td'><?php echo PARENTID;?></td>
		<td>
			<select name = 'parentid'>
				<option value = ''>- - Chọn chủ đề - -</option>
			<?php
			$mcatnews = new Models_MCatnews;
			$ldata = $mcatnews->listdata();
			echo $tmenu = TreeCat($ldata,0,"","","--");
			?>
			</select>&nbsp;<i style = 'color:red;'>(<?php echo LUUYCHUDE;?>)</i>
		</td>
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
