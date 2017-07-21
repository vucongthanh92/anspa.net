<?php

$mpayment = new Models_MPayment;

if(isset($_POST['tim']))
{
	$status=$_POST['status'];
	$sql="select * from mn_customer where status=$status order by Id DESC";
	$ds=mysql_query($sql) or die(mysql_error());
	$data['info']=$ds;
}

else
{
	$sql="select * from mn_customer order by Id DESC";
	$ds=mysql_query($sql) or die(mysql_error());
	$data['info']=$ds;
}

loadview("payment/list_view",$data);
?>