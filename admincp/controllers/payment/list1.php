<?php

$mpayment = new Models_MPayment;

$data['info'] =  $mpayment->listCustomer();

loadview("payment/list_view",$data);
?>