<?php
	$val = varGet("id");
	$id = substr($val,0,strpos($val, '-'));
	$db = new Models_MNews;
	$pg = new Paging;
	$mcat = new Models_MCatNews;
	$mcomment = new Models_MComment;
	$mflash = new Models_MFlash;
	$infonews["qcleft"] = $mflash->listdata('*', 'location = "3"','sort asc, Id desc');
	$infonews["qcright"] = $mflash->listdata('*', 'location = "4"','sort asc, Id desc');
	$infonews["comment"] = $mcomment ->listdata("*","ticlock='0'","sort ASC, Id DESC",5);
	$infonews["cat"] = $mcat->listdata("*","ticlock='0'","sort ASC, Id ASC",100);
	$infonews["idatv"] = $id;
	if($id==0){
		$where = "ticlock = '0'";
		$link = "tin-tuc.html";
		$infonews['map_title'] = "Tin tức";
	}
	else {
		$info_cat = $mcat->getOneCatnews($id);
		$title_cat = unicode_convert($info_cat['title_vn']);
		$where = "idcat = '$id' and ticlock = '0'";
		$link ="tintuc/danhmuc/".$id."-".$title_cat;
		$infonews['map_title'] =$info_cat['title_'.lang];
	}
	$total = $db->countdata($where);
	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 8; 
	$div = 10;
	$start = $p * $numrow;

	$select = "Id, title_".lang.", description_".lang.",images";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	$infonews['page']=$pg->divPage($total,$p,$div,$numrow,$link);
	
	
	loadview("news/view_listnews",$infonews);
	
?>