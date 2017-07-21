<?php
	$tukhoa = varGetPost("tukhoa");

	$mabout = new Models_MAbout;
	$pg = new Paging;
	$mcomment = new Models_MComment;
	$mflash = new Models_MFlash;
	$infonews["qcleft"] = $mflash->listdata('*', 'location = "3"','sort asc, Id desc');
	$infonews["qcright"] = $mflash->listdata('*', 'location = "4"','sort asc, Id desc');
	$infonews["comment"] = $mcomment ->listdata("*","ticlock='0'","sort ASC, Id DESC",5);
	$infonews["cat"] = $mabout->listdata("*","ticlock='0'","sort ASC, Id ASC",100);
	$infonews["idatv"] = 0;
	

	$where = "ticlock = '0' AND title_vn like   '%$tukhoa%'";
	$link =BASE_URL."index.php?tukhoa=".$tukhoa."&mod=gioithieu&act=timkiem&p=";
	$infonews['map_title'] ="Tìm kiếm tin tức";
	
	$total = $mabout->countdata($where);
	$infonews["count"] = $total;
	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$p = str_replace("/","",$p);
	$numrow = 8; 
	$div = 10;
	$start = $p * $numrow;

	$select = "Id, title_".lang.", description_".lang.",images";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $mabout->listdata($select,$where,$orderby,$limit);
	$infonews['page']=$pg->divPage($total,$p,$div,$numrow,$link);
	
	
	loadview("gioithieu/search_listnews",$infonews);
	
?>