<?php
$db = new Models_MThietbi;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	
	$data = array(
		'title_vn' 		=> addslashes(varPost('title_vn')),
		'description_vn'=> addslashes(varPost('description_vn','',1)),
		'content_vn'	=> addslashes(varPost('content_vn','',1)),
		'title_en' 		=> addslashes(varPost('title_en')),
		'description_en'=> addslashes(varPost('description_en','',1)),
		'content_en'	=> addslashes(varPost('content_en','',1)),
		'idcat' 		=> varPost('idcat'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	
	);
	
	//upload img
	if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Thietbi/",$error);
		if($hinh !="") $data['images'] = $hinh;
	}
	$db -> editNews($data,$id);
	//lay id cat cu
	$idcat = $_POST['idcat'];
	$link = array(
		'list'	=> "thietbi/list/".$idcat,
		'add'	=> "thietbi/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOneNews($id);
loadview("thietbi/edit_view",$data);
?>