<?php
$db = new Models_MWeblink;

if(isset($_POST['addnew'])){
	

	if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Partners/",$error);
	}else{ $hinh = "";}
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'images'		=> $hinh,
		'link' 			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);

	if($db-> addWeblink($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "weblink/list",
			'add'	=> "weblink/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('weblink/add_view',$data);
?>