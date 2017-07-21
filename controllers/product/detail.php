<?php

if(isset($_GET['id']))
{
	$val = varGet("id");
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog();
	$pg = new Paging;
	$id = $db->getAlias($val);
	
	$sp['info'] = $db->listdata('*','ticlock = "0" and ticnew = "1"','sort ASC, Id DESC','10');
	
	$numrow = 20;
	$div = 10;
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$start = $p * $numrow;
	/*lay thong tin san pham*/
	$sp['prod'] = $db->getOneProduct($id);
	$idcat = $sp['prod']['idcat']; 
	$mcat = new Models_MCatelog;
	$info_cat = $mcat->getOneCatelog($idcat);
	 $map_title  =  $map_title.$arrowmap."<a href='/san-pham.html'>Sản phẩm</a>";
	if($info_cat['parentid'] !=0){
		$subcat = $mcatelog ->getOneCatelog($info_cat['parentid']);
		if($subcat['parentid'] != 0){
			$subcat2 = $mcatelog ->getOneCatelog($subcat['parentid']);
			$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.$subcat2['alias'].'.html" title="'.$subcat2['title_'.lang].'">'.$subcat2['title_'.lang].'</a>' 
				. $arrowmap . '<a href = "'.$subcat['alias'].'.html" title="'.$subcat['title_'.lang].'">'.$subcat['title_'.lang].'</a>'
				. $arrowmap . '<a href = "'.$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';
		}else{
			$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.$subcat['alias'].'.html" title="'.$subcat['title_'.lang].'">'.$subcat['title_'.lang].'</a>' 
				. $arrowmap . '<a href = "'.$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';
		}
	}else{
		$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';
	}
	$sp['prod_cl']= $mproduct->listdata('*', 'idcat = "'.$idcat.'" and ticlock = "0" AND Id!="'.$id.'"','sort asc, Id desc',6);
	$sp['support'] = $title;
	$sp['adv'] = $mflash->listdata('*','ticlock="0" AND location="4"','sort ASC');
	$mnews = new Models_MNews;
	$sp['prohot']= $mnews -> listdata("*","ticlock ='0' ","counter DESC",5);
	$sp['listcat']= $mcat->listdata('*', 'parentid = "0" and ticlock = "0"','sort asc, Id desc',10);
	loadview("product/detail_view",$sp);
}
?>