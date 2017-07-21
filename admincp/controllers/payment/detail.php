<?php
$mpayment = new Models_MPayment;

$id = varGet("id");
$data = array(
	'view' => 1
);
$mpayment ->editCustomer($data,$id);
if(isset($_POST['btnsave'])){
	$note= $_POST['note'];
	$status = $_POST['status'];
	$sql="update mn_customer set note='$note',status=$status where Id=$id";
	mysql_query($sql) or (mysql_error());
	redirect(BASE_URL_ADMIN."payment/list");
}
$data['cus'] = $mpayment->OneCustomer($id);
$data['cart'] = $mpayment->listCustomerCart($id);


loadview("payment/detail",$data);
?>