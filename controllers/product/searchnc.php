<?php
	
if(isset($_POST['oksearch']) || isset($_SESSION['key']))
{
	if(isset($_POST['key'])){
		$_SESSION['key'] = $key = varGetPost("key");
		//$_SESSION['cat'] = $cat = varGetPost("cat","");
		//$_SESSION['subcat'] = $subcat = varGetPost("subcat","");
	}else{
		$key = $_SESSION['key'];
		//$cat = $_SESSION['cat'];
		//$subcat = $_SESSION['subcat'];
	}
	
	$db = new Models_MProduct;
	$pg = new Paging;

	$where = "ticlock = '0'";
	if($key != "" && $key != "Từ khóa"){
		$where  .= " and title_".lang." like '%$key%'";
	}
	/*
	if($subcat!=""){
		
		$subid = $mcatelog->getSubId($subcat);
		if($subid != ""){
			$subid = substr($subid,0,-1);
			$where .= "and idcat in ($subid)";
		}else{
			$where .= "and idcat = '$subcat'";
		}
	}elseif($cat != ""){
		$subid = $mcatelog->getSubId($cat);
		$arr = explode(",", $subid);
		if(!empty($arr)){
			foreach ($arr as $value) {
				if($value!=''){
					$tam = $mcatelog->getSubId($value);
					if($tam != "")
						$subid .= $tam;
				}
			}
		}
		if($subid != ""){
			$subid = substr($subid,0,-1);
			$where .= "and idcat in ($subid)";
		}else{
			$where .= "and idcat = '$cat'";
		}
	}
	*/
	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 21;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "Id, title_".lang.",images,price,unit,ticnew,description_".lang;
	$orderby = "sort asc, price desc";
	$limit = "$start,$numrow";	

	$sp['prod'] = $db->listdata($select,$where,$orderby,$limit);
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,"sanpham/timkiem.htm");
	
	$sp['title_pro'] = "Tìm kiếm";
	
	loadview("product/searchnc_view",$sp);
}else{
	redirect(BASE_URL);
}
	


?>