<?php
$db = new Models_MNews;

if(isset($_POST['addnew'])){
	
	if($_FILES['images']['name'] != ""){
		$tenhinh = strtoseo(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/News/",$error);
	}else{ $hinh = "";}
	$data = array(
		'title_vn' 		=> addslashes(varPost('title_vn')),
		'title_en' 		=> addslashes(varPost('title_en')),
		'description_vn'=> addslashes(varPost('description_vn','',1)),
		'description_en'=> addslashes(varPost('description_en','',1)),
		'content_vn'	=> addslashes(varPost('content_vn','',1)),
		'content_en'	=> addslashes(varPost('content_en','',1)),
		'date' 		=> date("Y-m-d H:i:s"),
		'idcat' 		=> varPost('idcat'),
		'images'		=> $hinh,
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'stitle'		=> varPost('stitle'),
		'sdescription'		=> varPost('sdescription'),
		'skeyword'		=> varPost('skeyword'),
		
	);
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }

	if($db-> addNews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$idcat = $_POST['idcat'];
		$link = array(
			'list'	=> "news/list/".$idcat,
			'add'	=> "news/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('news/add_view',$data);
?>