<?php
$mcatnews = new Models_MNhomthietbi;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'parentid' 		=> varPost('parentid','0'),
		'sort'			=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'price'		    => str_replace(".","",varPost('price','0')),
	);
	
	$mcatnews -> editCatnews($data,$id);
	$link = array(
		'list'	=> "nhomthietbi/list",
		'add'	=> "nhomthietbi/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $mcatnews -> getOneCatnews($id);
loadview("nhomthietbi/edit_view",$data);
?>