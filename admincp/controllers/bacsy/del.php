<?php
$db = new Models_MBacsy;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "bacsy/list",
		'add'	=> "bacsy/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	
	$cat = $db->getOneNews($id);
	$db -> del_onecheck($id);
	$link = array(
		'list'	=> "bacsy/list",
		'add'	=> "bacsy/add"
	);
	loadview("system/del_finish",$link);
}
?>