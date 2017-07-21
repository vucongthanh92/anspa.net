<?php

$mpagehtml = new Models_MPagehtml;
$id = intval(varGetPost("id"));

if(isset($_POST['editnew']))
{
	$data = array(
		"title_vn" 		=> varPost("title_vn"),
		"title_en" 		=> varPost("title_en"),
		"content_vn" 	=> addslashes(varPost("content_vn",'',1)),
		"content_vn" 	=> addslashes(varPost("content_vn",'',1)),
		"description_vn" 	=> addslashes(varPost("description_vn",'',1)),
		"ticlock"		=> varPost("ticlock","0"),
		'stitle'		=> varPost('stitle'),
		'sdescription'		=> varPost('sdescription'),
		'skeyword'		=> varPost('skeyword'),
	);
	if(stripcslashes(varPost('alias'))==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	$mpagehtml -> editPagehtml($data,$id);
	$link = array(
		'list'	=> "pagehtml/list",
		'add'	=> "pagehtml/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data["info"] = $mpagehtml->getnewsid($id);

loadview("pagehtml/edit_view",$data);
?>