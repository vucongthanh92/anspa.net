<?php

	$mcat = new Models_MCatNews;
	$db = new Models_MNews;
	$pg = new Paging;
	
	$val = $_GET['id'];
	$id = $mcat->getAlias($val);
	$subid = $mcat->getSubId($id);

	if($subid != ""){
		$subid = substr($subid,0,-1);
		$where = "idcat in ($subid) and ticlock = '0'";
	}else{
		$where = "ticlock ='0' and idcat = '".$id."'";
	}
	//echo $where;
	$total = $db->countdata($where);
	

	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 7; 
	$div = 10;
	$start = $p * $numrow;

	$select = "Id, title_vn, description_vn,images,title_en,alias,date,
	(SELECT title_vn FROM mn_catnews WHERE mn_catnews.Id = mn_news.idcat ) AS title_catelog,
	(SELECT alias FROM mn_catnews WHERE mn_catnews.Id = mn_news.idcat ) AS alias_catelog
	";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	
	$infonews['cat'] = $info_cat = $mcat->getOneCatnews($id);
	$url = BASE_URL."chu-de/".$info_cat['alias'].".html";
	$infonews['page']=$pg->divPage($total,$p,$div,$numrow,$url);
	
	$infonews['listcat']= $mcat->listdata('*', 'parentid = "4" and ticlock = "0"','sort asc, Id desc',5);
	$infonews['adv'] = $mflash->listdata('*','ticlock="0" AND location="4"','sort ASC');
	$mnews = new Models_MNews;
	$infonews['prohot']= $mnews -> listdata("*","ticlock ='0' ","counter DESC",5);
	
	if($info_cat['parentid'] !=0){
		$subcat = $mcat ->getOneCatnews($info_cat['parentid']);
		if($subcat['parentid'] != 0){
			$subcat2 = $mcat ->getOneCatnews($subcat['parentid']);
			$infonews['map_title'] =  $map_title . $arrowmap . '<a href = "/chu-de/'.$subcat2['alias'].'.html" >'.$subcat2['title_vn'].'</a>' 
				. $arrowmap . '<a href = "/chu-de/'.$subcat['alias'].'.html" >'.$subcat['title_vn'].'</a>'
				. $arrowmap . '<a href = "/chu-de/'.$info_cat['alias'].'.html" >'.$info_cat['title_vn'].'</a>';
		}else{
			$infonews['map_title'] =  $map_title . $arrowmap . '<a href = "/chu-de/'.$subcat['alias'].'.html" >'.$subcat['title_vn'].'</a>' 
				. $arrowmap . '<a href = "/chu-de/'.$info_cat['alias'].'.html" >'.$info_cat['title_vn'].'</a>';
		}
	}else{
		$infonews['map_title'] =  $map_title . $arrowmap . '<a href = "/chu-de/'.$info_cat['alias'].'.html" >'.$info_cat['title_'.lang].'</a>';
	}
	
	loadview("news/view_listnews",$infonews);

?>