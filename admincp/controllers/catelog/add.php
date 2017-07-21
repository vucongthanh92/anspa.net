<?php
$db = new Models_MCatelog;

if(isset($_POST['addnew'])){
	
	if($_FILES['images']['name'] != ""){
		$tenhinh = strtoseo(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Catelog/",$error);
	}else{ $hinh = "";}
	
	$data = array(
		'title_vn' 		  => varPost('title_vn'),
		'title_en' 		  => varPost('title_en'),
		'parentid'		  => varPost('parentid'),
		'sort'			  => varPost('sort'),
		'ticlock'		  => varPost('ticlock','0'),
		'stitle'		  => varPost('stitle'),
		'sdescription'	  => varPost('sdescription'),
		'skeyword'		  => varPost('skeyword'),
		'images'		  => $hinh,
		'parentid'		  => varPost('parentid'),
	);
	if(stripcslashes(varPost('alias'))==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }

	if($db-> addCatelog($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "catelog/list",
			'add'	=> "catelog/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('catelog/add_view',$data);
?>