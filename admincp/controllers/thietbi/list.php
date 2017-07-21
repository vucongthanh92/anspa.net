<?php

$db = new Models_MThietbi;
$pg = new Paging;

//menu cat
$mcatnews = new Models_MNhomthietbi;
$data['catnews'] = $mcatnews->listdata("","","sort asc","");

if(isset($_POST['id']) || isset($_GET['id']))
{ 

	$idcat = varGetPost("id");
	$where = "idcat = '$idcat' ";
	$link = "/$idcat";

}
else {
	$where = "";
	$link = "";
}

//paging
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 15;
$div = 30;
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] = $db->listdata($where,$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."thietbi/list$link");

loadview("thietbi/list_view",$data);

?>