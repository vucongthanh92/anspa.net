<?php
$db = new Models_MPartners;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		//'title_en' 		=> varPost('title_en'),
		'sort'			=> varPost('sort'),
		'link'			=> varPost('link'),
		'ticlock'		=> varPost('ticlock','0'),
		'idcat'			=> varPost('idcat'),
	);

	
	$db -> editPartners($data,$id);
	$link = array(
		'list'	=> "partners/list",
		'add'	=> "partners/add"
	);
	loadview("system/edit_finish",$link);
	return;
}

$data['info'] = $db -> getOnePartners($id);
loadview("partners/edit_view",$data);
?>