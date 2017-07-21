<?php
$db = new Models_MThietbi;

if(isset($_POST['addnew'])){
	
	if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Thietbi/",$error);
	}else{ $hinh = "";}
	$data = array(
		'title_vn' 		=> addslashes(varPost('title_vn')),
		'description_vn'=> addslashes(varPost('description_vn','',1)),
		'content_vn'	=> addslashes(varPost('content_vn','',1)),
		'title_en' 		=> addslashes(varPost('title_en')),
		'description_en'=> addslashes(varPost('description_en','',1)),
		'content_en'	=> addslashes(varPost('content_en','',1)),
		'idcat' 		=> varPost('idcat'),
		'images'		=> $hinh,
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		
	);

	if($db-> addNews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$idcat = $_POST['idcat'];
		$link = array(
			'list'	=> "thietbi/list/".$idcat,
			'add'	=> "thietbi/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('thietbi/add_view',$data);
?>