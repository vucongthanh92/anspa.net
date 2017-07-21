<?php
$mcatnews = new Models_MCatnews;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'parentid'		=> varPost('parentid'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'stitle'		=> varPost('stitle'),
		'sdescription'		=> varPost('sdescription'),
		'skeyword'		=> varPost('skeyword'),
	);
	if(stripcslashes(varPost('alias'))==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	$mcatnews -> editCatnews($data,$id);
	$link = array(
		'list'	=> "catnews/list",
		'add'	=> "catnews/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $mcatnews -> getOneCatnews($id);
loadview("catnews/edit_view",$data);
?>