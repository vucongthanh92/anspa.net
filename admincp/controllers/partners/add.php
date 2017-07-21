<?php
$db = new Models_MPartners;

if(isset($_POST['addnew'])){

	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		//'title_en' 		=> varPost('title_en'),
		'sort'			=> varPost('sort'),
		'link'			=> varPost('link'),
		'ticlock'		=> varPost('ticlock','0'),
		'idcat'			=> varPost('idcat'),
	);

	if($db-> addPartners($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "partners/list",
			'add'	=> "partners/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else {
	$data = '';
}

loadview('partners/add_view',$data);
?>