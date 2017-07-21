<?php
	$tukhoa = varGetPost("tukhoa");

	$db = new Models_MNews;
	$pg = new Paging;
	$mcat = new Models_MCatNews;
	$mcomment = new Models_MComment;
	$mflash = new Models_MFlash;
	$infonews["qcleft"] = $mflash->listdata('*', 'location = "3"','sort asc, Id desc');
	$infonews["qcright"] = $mflash->listdata('*', 'location = "4"','sort asc, Id desc');
	$infonews["comment"] = $mcomment ->listdata("*","ticlock='0'","sort ASC, Id DESC",5);
	$infonews["cat"] = $mcat->listdata("*","ticlock='0'","sort ASC, Id ASC",100);
	$infonews["idatv"] = 0;
	

	$where = "ticlock = '0' AND title_vn like   '%$tukhoa%'";
	$link =BASE_URL."index.php?tukhoa=".$tukhoa."&mod=tintuc&act=timkiem&p=";
	$infonews['map_title'] =$map_title.$arrowmap."<a href='tin-tuc.html'>".TINTUC."</a>".$arrowmap.TIMKIEM;
	
	$total = $db->countdata($where);
	$infonews["count"] = $total;
	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$p = str_replace("/","",$p);
	$numrow = 8; 
	$div = 10;
	$start = $p * $numrow;

	$select = "Id, title_".lang.", description_".lang.",images,title_en";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	$infonews['page']=$pg->divPage($total,$p,$div,$numrow,$link);
	
	
	loadview("news/search_listnews",$infonews);
	
?>