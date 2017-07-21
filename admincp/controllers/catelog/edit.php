<?php
$db = new Models_MCatelog;
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
	
	if($_FILES['images']['name'] != ""){
		$tenhinh = strtoseo(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Catelog/",$error);
	if($hinh != "") $data['images']= $hinh; }
	
	if(stripcslashes(varPost('alias'))==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	$db -> editCatelog($data,$id);
	$link = array(
		'list'	=> "catelog/list",
		'add'	=> "catelog/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneCatelog($id);
loadview("catelog/edit_view",$data);
?>