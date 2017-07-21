<?php

	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$pg = new Paging;

	$val = varGet("id");
	$id = $mcatelog->getAlias($val);
	$subid = $mcatelog->getSubId($id);
	if($subid != ""){
		$subid = substr($subid,0,-1);
		$where = "idcat in ($subid) and ticlock = '0'";
	}else{
		$where = "ticlock ='0' and idcat = '".$id."'";
	}
	
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 36;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "*";

	$orderby = "sort asc, price desc,Id desc";
	$limit = "$start,$numrow";	
	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);

	$sp['cat']=$info_cat = $mcatelog->getOneCatelog($id);
	$link = $info_cat['alias'].".html";
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL.$link);
	

	/* tieu de*/
	$map_title  =  $map_title.$arrowmap."<a href='/san-pham.html'>Sản phẩm</a>";
	if($info_cat['parentid'] !=0)
	{
		$subcat = $mcatelog ->getOneCatelog($info_cat['parentid']);
		if($subcat['parentid'] != 0)
		{
			$subcat2 = $mcatelog ->getOneCatelog($subcat['parentid']);
			$sp['title_pro'] = $subcat2['title_'.lang];
			$sp['map_title'] =  $map_title . $arrowmap.'<a href = "'.strtoseo($subcat2['title_vn']).'-c'.$subcat2['Id'].'.html" title="'
			.$subcat2['title_'.lang].'">'.$subcat2['title_'.lang].'</a>'.$arrowmap.'<a href = "'.strtoseo($subcat['title_vn'])
			.'-c'.$subcat['Id'].'.html" title="'.$subcat['title_'.lang].'">'.$subcat['title_'.lang].'</a>'.$arrowmap
			.'<a href = "'.strtoseo($info_cat['title_vn']).'-c'.$info_cat['Id'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang]
			.'</a>';
		}else{
			$sp['title_pro'] = $subcat['title_'.lang]; 
			$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.strtoseo($subcat['title_vn']).'-c'.$subcat['Id'].'.html" title="'.$subcat['title_'.lang].'">'.$subcat['title_'.lang].'</a>' 
				. $arrowmap . '<a href = "'.strtoseo($info_cat['title_vn']).'-c'.$info_cat['Id'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';
		}
	}else{
		$sp['title_pro'] = $info_cat['title_'.lang]; 
		$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.strtoseo($info_cat['title_vn']).'-c'.$info_cat['Id'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';
	}
	$mnews = new Models_MNews;
	$sp['prohot']= $mnews -> listdata("*","ticlock ='0' ","counter DESC",5);
	
	loadview("product/view_catelog",$sp);

?>