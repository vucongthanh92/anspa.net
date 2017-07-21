<?php
$mcatnews = new Models_MNhomthietbi;

if(isset($_POST['addnew'])){
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'parentid' 		=> varPost('parentid','0'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'price'		    => str_replace(".","",varPost('price','0')),
	);

	if($mcatnews-> addCatnews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "nhomthietbi/list",
			'add'	=> "nhomthietbi/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('nhomthietbi/add_view',$data);
?>