<?php
$db = new Models_MProduct;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{		
	$data = array(
		'title_vn' 			=> addslashes(varPost('title_vn')),
		'code_pro' 			=> addslashes(varPost('code_pro')),
		'hangsx' 			=> varPost('hangsx'),
		'description_vn'	=> addslashes(varPost('description_vn','',1)),
		'content_vn'		=> addslashes(varPost('content_vn','',1)),
		'idcat' 			=> varPost('idcat'),
		'codepro'			=> varPost('codepro'),
		'price'				=> str_replace(".", "", varPost('price')),
		'unit'			=> varPost('unit'),
		'sort'				=> varPost('sort'),
		'ticnew'			=> varPost('ticnew','0'),
		'codepro'			=> varPost('codepro','0'),
		'stitle'		=> varPost('stitle'),
		'sdescription'		=> varPost('sdescription'),
		'skeyword'		=> varPost('skeyword'),
	);
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	
	if($_FILES['images']['name'] != ""){
		$tenhinh = strtoseo(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Product/",$error);
	if($hinh != "") $data['images']= $hinh; }
	

	$db -> editProduct($data,$id);
	//lay id cat cu
	$idcat = $_POST['idcat'];
	$link = array(
		'list'	=> "product/list/".$idcat,
		'add'	=> "product/add/".$idcat
	);
	loadview("system/edit_finish",$link);
	return;
}


$data['info'] = $db -> getOneProduct($id);


loadview("product/edit_view",$data);
?>
