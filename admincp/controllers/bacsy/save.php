<?php

$db = new Models_Mbacsy;

//cap nhat thu tu sap xep
if(isset($_POST['sort'])){
	$data = $_POST['sort'];
	$db->sortData($data);
}

redirect(BASE_URL_ADMIN."bacsy/list");

?>