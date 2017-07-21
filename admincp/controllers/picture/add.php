<?php
$db = new Models_MPicture;

if(isset($_POST['addnew'])){
	
	if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn')).time().rand_string();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Picture/",$error);
	}else{ $hinh = "";}
		if($_FILES['file_vn']['name']!=""){
		
		$ext = strtolower(substr(strrchr($_FILES['file_vn']['name'], '.'), 1));// lay duoi file
		$name_file_vn = time(). '_' . $_FILES['file_vn']['name'];
		
		move_uploaded_file($_FILES['file_vn']['tmp_name'], '../data/Picture/'.$name_file_vn);
		
	}else{
		$name_file_vn = "";
	}
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'images'		=> $hinh,
		'file_vn'		=>$name_file_vn,
		'link'			=> varPost('link'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);

	if($db-> addNew($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "picture/list",
			'add'	=> "picture/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = "";
}

loadview('picture/add_view',$data);
?>