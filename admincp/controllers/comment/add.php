<?php
$db = new Models_MComment;

if(isset($_POST['addnew']))
{	
	$data = array
	(
		'content_vn'	   => addslashes(varPost('content_vn','',1)),
		'name'	           => addslashes(varPost('name','',1)),
		'email'	           => addslashes(varPost('email','',1)),
		'phone'	           => addslashes(varPost('phone','',1)),
		'sort'			   => varPost('sort'),
		'date'			   => date("d-m-Y"),
		'ticlock'		   => varPost('ticlock','0'),
	);

	if($db-> addNews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "comment/list",
			'add'	=> "comment/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('comment/add_view',$data);
?>