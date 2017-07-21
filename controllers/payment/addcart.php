<?php
session_start();
$id = varGet('id');
$s = varGet('s');
$_SESSION['cart2'][$id] = $s; 

redirect(BASE_URL."gio-hang.html");
 
die;
?> 
