<?php 

$mpagehtml = new Models_MPagehtml;

if(isset($_POST['addnew'])){
	
	
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'content_vn' 	=> addslashes(varPost('content_vn','',1)),
		'content_en' 	=> addslashes(varPost('content_en','',1)),
		'ticlock'		=> varPost('ticlock','0'),
		'stitle'		=> varPost('stitle'),
		'sdescription'		=> varPost('sdescription'),
		'skeyword'		=> varPost('skeyword'),
	);
	if(stripcslashes(varPost('alias'))==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else {$data['alias'] = varPost('alias'); }
	if($mpagehtml-> addPagehtml($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$link = array(
			'list'	=> "pagehtml/list",
			'add'	=> "pagehtml/add"
		);
		loadview("system/insert_finish",$link);
		return;
	}
	
}else{
	$data = '';
}

loadview("pagehtml/add_view",$data);

?>