<?php

$mcatnews = new Models_MNhomthietbi;

$data = $mcatnews->listdata();

loadview("nhomthietbi/list_view",$data);

?>