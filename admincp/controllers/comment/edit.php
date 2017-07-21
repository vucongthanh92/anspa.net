<?php
$db = new Models_MComment;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'content_vn'	   => addslashes(varPost('content_vn','',1)),
		'name'	           => addslashes(varPost('name','',1)),
		'email'	           => addslashes(varPost('email','',1)),
		'phone'	           => addslashes(varPost('phone','',1)),
		'sort'			   => varPost('sort'),
		'ticlock'		   => varPost('ticlock','0'),
	
	);
	
	$db -> editNews($data,$id);
	//lay id cat cu
	$link = array(
		'list'	=> "comment/list",
		'add'	=> "comment/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneNews($id);
loadview("comment/edit_view",$data);
?>