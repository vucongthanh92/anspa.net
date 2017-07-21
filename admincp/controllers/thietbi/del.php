<?php
$db = new Models_MThietbi;
if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "thietbi/list",
		'add'	=> "thietbi/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	
	$cat = $db->getOneNews($id);
	$db -> del_onecheck($id);
	$link = array(
		'list'	=> "thietbi/list",
		'add'	=> "thietbi/add"
	);
	loadview("system/del_finish",$link);
}
?>