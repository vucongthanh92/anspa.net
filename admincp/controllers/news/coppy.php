<?php
$db = new Models_MNews;
$dt = new Models_MTinmoi;

	$id = varGetPost("id");
	$dta = $dt -> getOneNews($id);
	$data = array(
		'title_vn' 		=> $dta["TieuDe"],
		//'title_en' 		=> addslashes(varPost('title_en')),
		'description_vn'=> addslashes($dta["TomTat"]),
		//'description_en'=> addslashes(varPost('description_en','',1)),
		'content_vn'	=> addslashes($dta["Content"]),
		//'content_en'	=> addslashes(varPost('content_en','',1)),
		'date' 		=>$dta["Ngay"],
		'idcat' 		=> "2",
		'images'		=> $dta["urlHinh"],
		'sort'			=> "1",
		'ticlock'		=> "0",
	
	);

	$db-> addNews($data);
	$dt -> del_onecheck($id);
		


redirect(BASE_URL_ADMIN."news/duyettin");
?>