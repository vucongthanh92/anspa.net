<?php
$mcatnews = new Models_MCatservices;

if(isset($_POST['check_list'])){
	$mcatnews -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "catservices/list",
		'add'	=> "catservices/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$mcatnews -> del_onecheck($id);
	$link = array(
		'list'	=> "catservices/list",
		'add'	=> "catservices/add"
	);
	loadview("system/del_finish",$link);
}
?>