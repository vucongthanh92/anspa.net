<?php

if(isset($_GET['id']))
{	
	 $val = varGet("id");
	//$id = substr($val,0,strpos($val, '-'));
	
	$mnews = new Models_MNews;
	$id = $mnews->getAlias($val);
	/*
	 * dem so len doc len 1
	 */
	$mnews->countView($id);
	/*
	 * lay tin tuc
	 */
	$arr['news'] = $mnews -> getOneNews($id,"*");
	$idcat = $arr['news']['idcat']; 
	$mcat = new Models_MCatNews;
	$arr['cat']=$info_cat = $mcat->getOneCatnews($idcat);
	$select = "title_vn,alias,Id,images,date,(SELECT alias FROM mn_catnews WHERE mn_catnews.Id = mn_news.idcat) AS alias_catelog,(SELECT title_vn FROM mn_catnews WHERE mn_catnews.Id = mn_news.idcat) AS catelog ";
	$arr['othernews'] = $mnews -> listdata("*","Id != '$id' and ticlock ='0' AND idcat = '".$idcat."'","Id desc",6);
	$arr['listcat']= $mcat->listdata('*', 'parentid = "4" and ticlock = "0"','sort asc, Id desc',5);
	$arr['adv'] = $mflash->listdata('*','ticlock="0" AND location="4"','sort ASC');
	$arr['prohot']= $mnews -> listdata("*","ticlock ='0' ","counter DESC",5);
	if($info_cat['parentid'] !=0){
		$subcat = $mcat ->getOneCatnews($info_cat['parentid']);
		if($subcat['parentid'] != 0){
			$subcat2 = $mcat ->getOneCatnews($subcat['parentid']);
			$arr['map_title'] =  $map_title . $arrowmap . '<a href = "/chu-de/'.$subcat2['alias'].'.html" >'.$subcat2['title_vn'].'</a>' 
				. $arrowmap . '<a href = "/chu-de/'.$subcat['alias'].'.html" >'.$subcat['title_vn'].'</a>'
				. $arrowmap . '<a href = "/chu-de/'.$info_cat['alias'].'.html" >'.$info_cat['title_vn'].'</a>';
		}else{
			$arr['map_title'] =  $map_title . $arrowmap . '<a href = "/chu-de/'.$subcat['alias'].'.html" >'.$subcat['title_vn'].'</a>' 
				. $arrowmap . '<a href = "/chu-de/'.$info_cat['alias'].'.html" >'.$info_cat['title_vn'].'</a>';
		}
	}else{
		$arr['map_title'] =  $map_title . $arrowmap . '<a href = "/chu-de/'.$info_cat['alias'].'.html" >'.$info_cat['title_'.lang].'</a>';
	}
	
	loadview("news/view_detailnews",$arr);
	
}
?>