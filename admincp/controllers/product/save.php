<?php

$db = new Models_MProduct;

/*cap nhat thu tu sap xep*/
if(isset($_POST['sort'])){
	$data = $_POST['sort'];
	$db->sortData($data);
}

/*cap nhat giá */
if(isset($_POST['price'])){
	$data = $_POST['price'];
	$db->editPrice($data);
}


redirect(BASE_URL_ADMIN."product/list");

?>