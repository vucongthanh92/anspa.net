<?php
/* meta */
$theh=0;
$meta = array();
$mproduct = new Models_MProduct;
$mcatelog = new Models_MCatelog;
$mnew = new Models_MNews;
$meta['title_page'] = $title['title_page'];
$meta['description_page'] = $title['description_page'];
$meta['keyword_page']=$title['keyword_page'];
if($_GET['mod']=='sanpham'){
	if($_GET['act']=='danhmuc'){
		$val = $_GET['id'];
		$id = $mcatelog->getAlias($val);
		if($id>0){
			$row = $mcatelog->getOneCatelog($id);
			$meta['title_page'] = $row['title_vn'];
			if(strlen($row['stitle'])>0){
				$meta['title_page'] = $row['stitle'];
			} 
			if(strlen($row['sdescription'])>0){
				$meta['description_page'] = $row['sdescription'];
			} 
			if(strlen($row['skeyword'])>0){
				$meta['keyword_page'] = $row['skeyword'];
			}
		}
	}
	elseif($_GET['act']=='chitiet'){
		$theh=1;
		$val = $_GET['id'];
		$id = $mproduct->getAlias($val);
		if($id<=0){
			redirect(BASE_URL);
			exit();
		}
		$row = $mproduct->getOneProduct($id);
		$meta['title_page'] = $row['title_vn'];
		if(strlen($row['stitle'])>0){
			$meta['title_page'] = $row['stitle'];
		} 
		if(strlen($row['sdescription'])>0){
			$meta['description_page'] = $row['sdescription'];
		} 
		if(strlen($row['skeyword'])>0){
			$meta['keyword_page'] = $row['skeyword'];
		}
	}
	else {
		$meta['title_page'] = " Tìm kiếm sản phẩm";
	}
}
elseif($_GET['mod']=='tin-tuc'){
	if($_GET['act']=='danh-muc'){
		$mcat = new Models_MCatNews;
		$id = $mcat->getAlias($_GET['id']);
		if($id<=0){
			redirect(BASE_URL);
			exit();
		}
		$info_cat = $mcat->getOneCatnews($id);
		$meta['title_page'] = $info_cat['title_vn'];
		if(strlen($info_cat['stitle'])>0){
			$meta['title_page'] = $info_cat['stitle'];
		} 
		if(strlen($info_cat['sdescription'])>0){
			$meta['description_page'] = $info_cat['sdescription'];
		} 
		if(strlen($info_cat['skeyword'])>0){
			$meta['keyword_page'] = $info_cat['skeyword'];
		}
		
	}
	else {
		$theh=1;
		$val = $_GET['id'];
		$id = $mnew->getAlias($val);
		if($id<=0){
			redirect(BASE_URL);
			exit();
		}
		$row = $mnew->getOneNews($id,"*");
		$meta['title_page'] = $row['title_vn'];

		if(strlen($row['stitle'])>0){
			$meta['title_page'] = $row['stitle'];
		} 
		if(strlen($row['sdescription'])>0){
			$meta['description_page'] = $row['sdescription'];
		}else{
			$meta['description_page'] =limit_text($row['description_vn'],160);	
		}
		if(strlen($row['skeyword'])>0){
			$meta['keyword_page'] = $row['skeyword'];
		}
	}
}
else if($_GET['mod']=="bai-viet"){
		$mpagehtml = new Models_MPagehtml;
		$id= $mpagehtml ->getAlias($_GET['id']);
		if($id<=0){
			redirect(BASE_URL);
			exit();
		}
		$row = $mpagehtml->getpagehtmlid($id);
		$meta['title_page'] = $row['title_vn'];
		if(strlen($row['stitle'])>0){
			$meta['title_page'] = $row['stitle'];
		} 
		if(strlen($row['sdescription'])>0){
			$meta['description_page'] = $row['sdescription'];
		}
		if(strlen($row['skeyword'])>0){
			$meta['keyword_page'] = $row['skeyword'];
		}
		// $meta['description_page'] =stripcslashes(limit_text($row['content_vn'],255));
		// $meta['keyword_page']=stripcslashes(limit_text($row['content_vn'],255));
}
else if($_GET['mod']=="lien-he"){
	
		$meta['title_page'] = "Liên hệ với chúng tôi";
		
		// $meta['description_page'] =stripcslashes(limit_text($row['content_vn'],255));
		// $meta['keyword_page']=stripcslashes(limit_text($row['content_vn'],255));
}
else{
	$theh=1;
	$meta['title_page'] = $title['title_page'];
	$meta['description_page'] = $title['description_page'];
	$meta['keyword_page']=$title['keyword_page'];
}
?>