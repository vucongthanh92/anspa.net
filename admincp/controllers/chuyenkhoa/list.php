<?php

$mcatnews = new Models_MChuyenkhoa;

$data = $mcatnews->listdata();

loadview("chuyenkhoa/list_view",$data);

?>