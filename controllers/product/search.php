<?php	
	$db = new Models_MProduct;
	$pg = new Paging;
	$mcatelog = new Models_MCatelog;
	
	$where = "ticlock = '0' ";
	$query = explode('?',$_SERVER['REQUEST_URI']);
	$arr = getParam($query[1]);
	$tukhoa = $_POST['search_tukhoa'];	
	$where .= " AND ( title_".lang." like '%".$tukhoa."%' OR codepro like '%".$tukhoa."%' )";
	$sp['tukhoa']=$tukhoa;
	//echo $where;
	//paging
	$p = str_replace('/p','',isset($arr['p'])?$arr['p']:0);
	$numrow = 9;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	
	
	$select = "*";
	$orderby = "sort asc,  price desc";
	$limit = "$start,$numrow";	
	$sp['info'] = $db->listdata($select,$where,$orderby,$limit);
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL."search/?q=".$tukhoa."&p=");
	
	$sp['title_pro'] = "Tìm kiếm";
	$sp['total'] = $total;
	
	$sp['map_title'] = $map_title.$arrowmap."<a href=''>Tìm kiếm</a>";
	loadview("product/searchnc_view",$sp);
?>