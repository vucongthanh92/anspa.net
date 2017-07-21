<?php
session_start();
$mpayment = new Models_MPayment;
$id = $_GET["id"];
if(isset($_GET['id']) )
{
	unset($_SESSION["cart2"][$id]);
}

redirect(BASE_URL."gio-hang.html");

?>