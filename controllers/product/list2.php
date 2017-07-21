<?php

	
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$pg = new Paging;


	$where = "ticlock ='0'";

	
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 36;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	$select = "*";
	$orderby = "Id desc";
	$limit = "$start,$numrow";	
	
	$sp['total_pro_1'] = $db->countdata($where);
	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);

	$link = "san-pham.html";
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL.$link);
	$sp['cat']['title_vn'] = "Sản phẩm mới";
	$sp['map_title'] = $map_title.$arrowmap."<a href='san-pham.html'>Tất cả sản phẩm mới</a>";
	
	loadview("product/list_view",$sp);

?>