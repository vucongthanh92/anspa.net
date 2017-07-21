<?php
$db = new Models_MBacsy;

if(isset($_POST['addnew'])){
	
	$data = array(
		'title_vn' 		   => addslashes(varPost('title_vn')),
		'title_en' 		   => addslashes(varPost('title_en')),
		'sort'			   => varPost('sort'),
		'ticlock'		   => varPost('ticlock','0'),
		'parentid'		   => varPost('parentid','0'),
		'price'		       => str_replace(".","",varPost('price','0')),	
	);

	if($db-> addNews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$idcat = $_POST['idcat'];
		$link = array(
			'list'	=> "bacsy/list/".$idcat,
			'add'	=> "bacsy/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('bacsy/add_view',$data);
?>