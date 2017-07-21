<?php

$mcatnews = new Models_MCatservices;

$data = $mcatnews->listdata();

loadview("catservices/list_view",$data);

?>