<?php
$mpayment = new Models_MPayment;

$id = varGet("id");
$data = array(
	'view' => 1
);
$mpayment ->editCustomer($data,$id);
if(isset($_POST['note'])){
	$data['note']= $_POST['note'];
	$mpayment ->editCustomer($data,$id);
	redirect(BASE_URL_ADMIN."payment/list");
}
$data['cus'] = $mpayment->OneCustomer($id);
$cart = $mpayment->listCustomerCart($id);
if(!empty($cart))
{
	$mproduct = new Models_MProduct;
	$str = "";
	
	$i=0;
	foreach($cart as $item)
	{
		$data['pro'][$i]= $mproduct->getOneProduct($item['idpro']);
		$data['pro'][$i]['amount'] = $item['amount'];
		$i++;
	}
}

loadview("payment/detail",$data);
?>