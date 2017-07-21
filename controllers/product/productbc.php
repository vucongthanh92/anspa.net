<?php

$title_page = $title_page."-".MN_PRO."-";
$map_title = MN_PRO;

	$db = new Models_MProduct;
	$pg = new Paging;

	$where = "banchay = '1' and ticlock = '0'";
	
	//paging
	$p = isset($_GET['p'])?varGetPost('p'):0;
	$numrow = 30;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "Id, title_".lang.", description_".lang.",images,price,unit";

	$orderby = "Id desc,sort asc";
	$limit = "$start,$numrow";	
	
	$sp['pro'] = $db->listdata($select,$where,$orderby,$limit);
	
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL."product/productbc.htm");

	//tieu de trang
	$title_page .= 'Sản phẩm bán chạy';
	$map_title .= $arrowmap.'Sản phẩm bán chạy';
	
	$sp['map_title'] =  $map_title;
	$sp['tongcart'] = $tongcart;
	
	loadview("product/productbc",$sp);

?>