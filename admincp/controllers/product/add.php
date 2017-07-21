<?php

$db = new Models_MProduct;

if(isset($_POST['addnew']))
{
	if($_FILES['images']['name'] != ""){
		$tenhinh = strtoseo(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Product/",$error);
	}else{ $hinh = "";}
	$data = array(
		'title_vn' 			=> addslashes(varPost('title_vn')),
		'code_pro' 			=> addslashes(varPost('code_pro')),
		'hangsx' 			=> varPost('hangsx'),
		'description_vn'	=> addslashes(varPost('description_vn','',1)),
		'content_vn'		=> addslashes(varPost('content_vn','',1)),
		'idcat' 			=> varPost('idcat'),
		'price'				=> str_replace(".", "", varPost('price')),
		'images'			=> $hinh,
		'sort'				=> varPost('sort'),
		'ticlock'			=> varPost('ticlock','0'),	
		'ticnew'			=> varPost('ticnew','0'),
		'codepro'			=> varPost('codepro'),
		'unit'			    => varPost('unit'),
		'stitle'		    => varPost('stitle'),
		'sdescription'		=> varPost('sdescription'),
		'skeyword'		    => varPost('skeyword'),
	);
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	$idpro = $db->getinsertid();
	
	if($db-> addProduct($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		
		$idcat = $_POST['idcat'];
		$link = array(
			'list'	=> "product/list/".$idcat,
			'add'	=> "product/add/".$idcat
		);
		loadview("system/insert_finish",$link);
		return;
	}
	
}else{

	
	$data = "";
}
loadview('product/add_view',$data);
?>