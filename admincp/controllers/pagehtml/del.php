<?php

$mpagehtml = new Models_MPagehtml;

if(isset($_POST['check_list'])){
	$mpagehtml -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "pagehtml/list",
		'add'	=> "pagehtml/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$mpagehtml -> del_onecheck($id);
	$link = array(
		'list'	=> "pagehtml/list",
		'add'	=> "pagehtml/add"
	);
	loadview("system/del_finish",$link);
}

?>