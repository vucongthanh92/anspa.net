<?php
if(isset($_GET['id']))
	$id = (int)$_GET['id'];
else {
	echo 0;
	break ;	
}

$mcatelog = new Models_MCatelog();

$data = $mcatelog->listdata('Id,title_'.lang, 'parentid = "'.$id.'" and ticlock = "0"','sort asc, Id desc');

loadview('product/getsubcat',$data);
?>