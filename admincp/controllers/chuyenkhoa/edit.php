<?php
$mcatnews = new Models_MChuyenkhoa;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
	);
	/*if($_FILES['images']['name'] != ""){
		$tenhinh = unicode_convert2(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/News/",$error);
		if($hinh !="") $data['images'] = $hinh;
	}*/
	$mcatnews -> editCatnews($data,$id);
	$link = array(
		'list'	=> "chuyenkhoa/list",
		'add'	=> "chuyenkhoa/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $mcatnews -> getOneCatnews($id);
loadview("chuyenkhoa/edit_view",$data);
?>