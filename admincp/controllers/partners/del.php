<?php
$db = new Models_MPartners;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "partners/list",
		'add'	=> "partners/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$db -> del_onecheck($id);
	$link = array(
		'list'	=> "partners/list",
		'add'	=> "partners/add"
	);
	loadview("system/del_finish",$link);
}
?>