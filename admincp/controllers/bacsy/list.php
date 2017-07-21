<?php

$db = new Models_MBacsy;
$pg = new Paging;

	$where = "";
	$link = "";

//paging
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 15;
$div = 30;
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] = $db->listdata($where,$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."bacsy/list$link");

loadview("bacsy/list_view",$data);

?>