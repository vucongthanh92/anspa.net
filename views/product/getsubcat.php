<select name="subcat" class="textf2" id="select2">
   	<option value="">Danh mục con</option>
   	<?php 
		if(!empty($data)){
			foreach ($data as $item){
	?>
		<option value="<?=$item['Id']?>"><?=$item['title_'.lang]?></option>
	<?php 
			}
		}
	?>
</select>