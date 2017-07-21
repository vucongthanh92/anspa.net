<?php

$db = new Models_MComment;
$pg = new Paging;

//paging
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 15;
$div = 30;
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] = $db->listdata($where,$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."comment/list$link");

loadview("comment/list_view",$data);

?>