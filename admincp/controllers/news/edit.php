<?php
$db = new Models_MNews;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'title_vn' 		=> addslashes(varPost('title_vn')),
		'alias' 		=> strtoseo(varPost('title_vn')),
		'title_en' 		=> addslashes(varPost('title_en')),
		'description_vn'=> addslashes(varPost('description_vn','',1)),
		'description_en'=> addslashes(varPost('description_en','',1)),
		'content_vn'	=> addslashes(varPost('content_vn','',1)),
		'content_en'	=> addslashes(varPost('content_en','',1)),
		//'banggia' 		=> varPost('banggia'),
		'idcat' 		=> varPost('idcat'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'stitle'		=> varPost('stitle'),
		'sdescription'		=> varPost('sdescription'),
		'skeyword'		=> varPost('skeyword'),
	
	);
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	//upload img
	if($_FILES['images']['name'] != ""){
		$tenhinh = strtoseo(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/News/",$error);
		if($hinh!="") $data['images'] = $hinh;
	}
	$db -> editNews($data,$id);
	//lay id cat cu
	$idcat = $_POST['idcat'];
	$link = array(
		'list'	=> "news/list/".$idcat,
		'add'	=> "news/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneNews($id);
loadview("news/edit_view",$data);
?>