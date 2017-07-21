<?php
include ('header.php');

$table = varGet('table');
$colum = varGet('colum');
$id = varGet('id');
$value = varGet('value');

switch($table){ //kiem tra update thuoc bang nao

	case ''.TBL_GALLERY.'':			$db = new Models_MGallery; break;
	case ''.TBL_PICTURES.'':		$db = new Models_MPicture; break;
	case ''.TBL_SERVICES.'':		$db = new Models_MServices; break;
	case ''.TBL_CATSERVICES.'':		$db = new Models_MCatservices; break;
	case ''.TBL_ABOUT.'':		    $db = new Models_MAbout; break;
	case ''.TBL_THIETBI.'':		    $db = new Models_MThietbi; break;
	case ''.TBL_NHOMTHIETBI.'':		$db = new Models_MNhomthietbi; break;
	case ''.TBL_CHUYENKHOA.'':		$db = new Models_MChuyenkhoa; break;
	
	case ''.TBL_PAGEHTML.'':		$db = new Models_MPagehtml; break;
	case ''.TBL_MANUFACTURER.'': 	$db = new Models_MManufacturer; break;
	
	case ''.TBL_PRODUCT.'': 		$db = new Models_MProduct; break;
	case ''.TBL_CATELOG.'': 		$db = new Models_MCatelog; break;
	
	case ''.TBL_NEWS.'':			$db = new Models_MNews;	break;
	case ''.TBL_CATNEWS.'':			$db = new Models_MCatnews; break;
	case ''.TBL_COMMENT.'':			$db = new Models_MComment(); break;
	case ''.TBL_BACSY.'':			$db = new Models_MBacsy(); break;
	case ''.TBL_FLASH.'':			$db = new Models_MFlash(); break;
}

$data = array($colum=>$value);
$db->ticlockactive($data,$id);

if($value == 1){
	echo '<div id = "'.$id.'"><a href = "javascript:ticlockactive(\''.$table.'\',\'ticlock\','.$id.',\'0\',\''.BASE_URL_ADMIN.'\');" title = "Bỏ khóa"><img src = "'.ADMIN_PATH_IMG.'visible.gif"></a></div>';
}else{
	echo '<div id = "'.$id.'"><a href = "javascript:ticlockactive(\''.$table.'\',\'ticlock\','.$id.',\'1\',\''.BASE_URL_ADMIN.'\');" title = "Khóa tin"><img src = "'.ADMIN_PATH_IMG.'invisible.gif"></a></div>';
}

?>