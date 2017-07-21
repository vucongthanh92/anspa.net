<?php
$mcatnews = new Models_MChuyenkhoa;

if(isset($_POST['addnew'])){
	/*if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/News/",$error);
	}else{ $hinh = "";}  */
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'sort'			=> varPost('sort'),
		//'images'        =>$hinh,
		'ticlock'		=> varPost('ticlock','0'),
	);

	if($mcatnews-> addCatnews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "chuyenkhoa/list",
			'add'	=> "chuyenkhoa/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('chuyenkhoa/add_view',$data);
?>