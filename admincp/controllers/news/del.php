<?php
$db = new Models_MNews;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "news/list",
		'add'	=> "news/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	
	$cat = $db->getOneNews($id);
	$db -> del_onecheck($id);
	$link = array(
		'list'	=> "news/list/",
		'add'	=> "news/add"
	);
	loadview("system/del_finish",$link);
}
?>