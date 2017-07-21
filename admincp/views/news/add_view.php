<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo NEWS_ADD_TITLE; ?></h1>

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

<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>news/add' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">

<table>

	<tr>

		<td class = 'title_td'><?php echo PARENTID;?></td>

		<td>

			<select name = 'idcat'>

				<option value = ''>- - Chọn chủ đề - -</option>

			<?php

			$mcatnews = new Models_MCatnews;

			$ldata = $mcatnews->listdata();

			echo $tmenu = TreeCat($ldata,0,"","","--");

			?>

			</select>

		</td>

	</tr>

<?php

foreach($config_lang as $klang => $vlang)

{

?>

	<tr>

		<td class = 'title_td'><?php echo TITLE;?></td>

		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50'></td>

	</tr>
<tr>

		<td class = 'title_td'>Alias</td>

		<td><input type = 'text' name = 'alias' size = '50'></td>

	</tr>
	<tr>

		<td class = 'title_td'><?php echo DESCRIPTION;?></td>

		<td><?php getFCKeditor("description_".$vlang,"",500); ?></td>

	</tr>

	<tr>

		<td class = 'title_td'><?php echo CONTENT;?></td>

		<td><?php getFCKeditor("content_".$vlang,"",500); ?></td>

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

