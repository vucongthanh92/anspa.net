<?php
$mcatnews = new Models_MCatnews;

if(isset($_POST['check_list'])){
	$mcatnews -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "catnews/list",
		'add'	=> "catnews/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$mcatnews -> del_onecheck($id);
	$link = array(
		'list'	=> "catnews/list",
		'add'	=> "catnews/add"
	);
	loadview("system/del_finish",$link);
}
?>