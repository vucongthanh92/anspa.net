<?php

$mpayment = new Models_MPayment;
$cart['map_title'] = $map_title.$arrowmap."Đặt hàng"; 
$cart["email_admin"]=$title['emaillienhe_vn'];
//unset($_SESSION['giohang']);
//var_dump($_SESSION['giohang']);

loadview("payment/showcart",$cart);
?>