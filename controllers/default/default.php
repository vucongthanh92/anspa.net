<?php
$mproduct = new Models_MProduct();
$mcatelog = new Models_MCatelog();
$mflash = new Models_MFlash();
$mpagehtml = new Models_MPagehtml;
$pg = new Paging;
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 10;
$div = 10;
$where = ' ticlock = "0" and ticnew = "1"';
//$total = $mproduct->countdata($where);
$start = $p * $numrow;
$limit = "$start,$numrow";	
$default['info'] = $mproduct->listdata('*',$where,'sort ASC, Id DESC',$limit);

$sql="select * from mn_comment where ticlock='0' order by sort desc, Id desc limit 6";
$ds=mysql_query($sql) or die(mysql_error());
$default['comment'] = $ds;

$default['advbottom'] = $mflash->listdata('*','ticlock="0" AND location="5"','sort ASC');
$default['baiviet']= $mnews->listdata('*', 'NoiBat = "1" and ticlock = "0"','sort asc, Id desc',4);
$default['camnangkhachang']= $mnews->listdata('*', 'idcat = "1" and ticlock = "0"','sort asc, Id desc',10);
$default['hotrokhachhang']= $mpagehtml->getpagehtmlid(14);
$default['chinhsachdaily']= $mpagehtml->getpagehtmlid(15);
$default['support'] = $title;
loadview("default/view_default",$default);
?>