<?php
$mcatnews = new Models_MCatNews;

if(isset($_POST['addnew'])){
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'parentid'		=> varPost('parentid'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'stitle'		=> varPost('stitle'),
		'sdescription'		=> varPost('sdescription'),
		'skeyword'		=> varPost('skeyword'),
	);
	if(stripcslashes(varPost('alias'))==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	if($mcatnews-> addCatnews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "catnews/list",
			'add'	=> "catnews/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
}else{
	$data = '';
}

loadview('catnews/add_view',$data);
?>