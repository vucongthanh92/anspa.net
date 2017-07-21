<?php
$mpagehtml = new Models_MPagehtml;
$mnews = new Models_MNews();
$mcatelog = new Models_MCatelog();
$mflash = new Models_MFlash();
$mcat = new Models_MCatNews;
$mproduct = new Models_MProduct();
$partner = new Models_MPartners();
/*
 *banner 
 */
if(isset($_SESSION['cart2'])==false) {
	$banner["tong"] = "0";
} else {
$tong = 0;
 $tongdonhang =0;

 foreach($_SESSION['cart2'] as $k=>$v){
	if($k>0){
		$tong = $tong + $v;
		$row = $mproduct->getOneProduct($k);
		$tien  = $tien +$row['price'];
	}
 }
 $banner["tong"] = $tong;
 $banner["tientong"] = $tien;
}
$banner['danhmuc'] = $mcatelog->listdata('Id,alias,title_'.lang, 'parentid = "0" and ticlock = "0" ','sort asc, Id desc');
$banner['newsupport']= $mnews->listdata('*', 'idcat = "6" and ticlock = "0"','sort asc, Id desc',5);
$banner['support']  = $title;
$banner["logo"] = $mflash->getOneflashLocation(1);
$banner["slogan"] = $mflash->getOneflashLocation(6);

$slide['slide'] = $mflash->listdata('*','ticlock="0" AND location="3"','sort ASC');


$footer['info'] = $mpagehtml->getpagehtmlid(1);
$footer['boxf']= $mcat->listdata('*', 'home = "1" and ticlock = "0" ','sort asc, Id desc',3);

?>