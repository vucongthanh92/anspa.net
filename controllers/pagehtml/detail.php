<?php

$mproduct = new Models_MProduct();
$mflash = new Models_MFlash();
$mpagehtml = new Models_MPageHtml;

$val = varGet("id");
$id = $mpagehtml->getAlias($val);
$pagehtml['info'] = $mpagehtml->getpagehtmlid($id);

//tieu de trang
$map_title = 

$pagehtml['map_title'] =  $map_title.$arrowmap.$pagehtml['info']['title_'.lang];
$pagehtml['adv'] = $mflash->listdata('*','ticlock="0" AND location="4"','sort ASC');
$mnews = new Models_MNews;
$pagehtml['prohot']= $mnews -> listdata("*","ticlock ='0' ","counter DESC",5);

loadview("pagehtml/detail_view",$pagehtml);
?>