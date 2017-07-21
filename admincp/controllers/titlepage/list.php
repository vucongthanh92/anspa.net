<?php
if(isset($_POST['save'])){
	$yahoo1 = trim($_POST['yahoo1']);	
	$phone1 = trim($_POST['phone1']);
	$name1 = trim($_POST['name1']);	
	
	$yahoo2 = trim($_POST['yahoo2']);	
	$phone2 = trim($_POST['phone2']);
	$name2 = trim($_POST['name2']);	
	
	$yahoo3 = trim($_POST['yahoo3']);	
	$phone3 = trim($_POST['phone3']);
	$name3 = trim($_POST['name3']);	
	
	$yahoo4 = trim($_POST['yahoo4']);	
	$phone4 = trim($_POST['phone4']);
	$name4 = trim($_POST['name4']);	
	
	$title_page= trim($_POST['title_page']);
	$description_page= trim($_POST['description_page']);
	$keyword_page= trim($_POST['keyword_page']);
	
	$hotline1= trim($_POST['hotline1']);
	$hotline2= trim($_POST['hotline2']);		
	$emaillienhevn= trim($_POST['emaillienhevn']);	
	
	
$text = "<?php	

\$title['yahoo1'] = '".$yahoo1."';	
\$title['phone1'] = '".$phone1."';	
\$title['name1']='".$name1."';	
	
\$title['yahoo2'] = '".$yahoo2."';	
\$title['phone2'] = '".$phone2."';	
\$title['name2']='".$name2."';

\$title['yahoo3'] = '".$yahoo3."';	
\$title['phone3'] = '".$phone3."';	
\$title['name3']='".$name3."';


\$title['yahoo4'] = '".$yahoo4."';	
\$title['phone4'] = '".$phone4."';	
\$title['name4']='".$name4."';

\$title['title_page']='".$title_page."';
\$title['description_page']='".$description_page."';
\$title['keyword_page']='".$keyword_page."';

\$title['hotline1']='".$hotline1."';
\$title['hotline2']='".$hotline2."';	
\$title['emaillienhe_vn']='".$emaillienhevn."';?>";	
 
$file = "../config/title_page.php";

if(file_exists($file)){		
$fp = fopen($file, 'w');		
fwrite($fp, $text);		fclose($fp);	
}
}if(file_exists('../config/title_page.php')){	include '../config/title_page.php';}

loadview('titlepage/list',$title);
?>