<H1>Lấy tin dantri.com.vn</H1>
<?php
include("simplehtmldom/simple_html_dom.php");
function LuuTinVaoDB($tin, $url, $source){
	$tieude = trim(mysql_real_escape_string(strip_tags($tin['tieude'])));
	$tomtat = trim(mysql_real_escape_string(strip_tags($tin['tomtat'])));
	$content = trim(mysql_real_escape_string($tin['content']));
$urlHinh = trim(mysql_real_escape_string(strip_tags($tin['urlHinh'])));

$sql = "SELECT idTin from mn_tinmoi where urlGoc='{$url}'";
	$rs = mysql_query($sql) or die (mysql_error());
	if (mysql_num_rows($rs) >0 ) return false;

	$sql="INSERT INTO mn_tinmoi (TieuDe,TomTat, Content, urlGoc, Source, Ngay, urlHinh)
		VALUES ('$tieude','$tomtat', '$content', '$url', '$source', Now(),'$urlHinh')";
	mysql_query($sql) or die (mysql_error());
	return true;
}
function VnExpress_TrangChu($url) {
	$linkarray=array();
	$url2 = "http://dantri.com.vn";
	$html = file_get_html($url);
	foreach ($html->find("a.fon44") as $link){			
		if ($link->href==NULL)  continue;
		if ($link->plaintext==NULL) continue;
		$text=str_replace("&nbsp;"," ",$link->plaintext);
		$text=trim($text);		
		if ($text=="") continue;
		if (substr($link->href,0,1)=="/") $link->href=$url2. $link->href;
		if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href;
	}
	
	foreach ($html->find("a.fon6") as $link){
		if ($link->href==NULL)  continue;
		if ($link->plaintext==NULL) continue;
		$text=str_replace("&nbsp;"," ",$link->plaintext);
		$text=trim($text);		
		if ($text=="") continue;
		if (substr($link->href,0,1)=="/") $link->href=$url2. $link->href;
		if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href;
	}
	$html->clear();
	unset($html);
	return $linkarray;
}
/*
function VnExpress_Lay1Tin($urlwebsite,$url) {
	$html = file_get_html($url);
	$tin = array();
	$td = $html->find('.fon31 ',0);
	 $tin['tieude']=$td->innertext;
	$td->outertext='';
	$tt = $html->find('.fon33 ',0);
	$tin['tomtat']=$tt->innertext;
	$tt->outertext = '';
	$content = $html->find('[cpms_fon34=true]',0);
$urlHinh='';
	if ($content!=NULL)
	foreach( $content->find('img') as $img) {		
		if (substr($img->src,0,1) == "/") $img->src = $urlwebsite.$img->src;
		$tenfile = basename($img->src);
		$pathfile = "../data/News/".$tenfile;
		file_put_contents($pathfile, file_get_contents($img->src));
		$img->src = "data/News/".$tenfile;	
		$tin["urlHinh"] = $tenfile;	
	}
	$tin['content'] = $content->innertext;
	$html->clear();
	unset($html);
	return $tin;
}
*/

function VnExpress_Lay1Tin($urlwebsite,$url) {
	$html = file_get_html($url);
	$tin = array();
	$td = $html->find('.fon31',0);
	$tin['tieude']=$td->innertext;
	$td->outertext='';
	$tt = $html->find('.fon33',0);
	$tin['tomtat']=$tt->innertext;
	$tt->outertext = '';
	$content = $html->find('div.fon34',0);		
	///$content_img = $content->find('div');
	if ($content!=NULL) 
	foreach($content->find('img') as $img) {		
		if (substr($img->src,0,1) == "/") $img->src = $urlwebsite.$img->src;
		$tenfile = basename($img->src);
		$pathfile = "../data/News/".$tenfile;
		file_put_contents($pathfile, file_get_contents($img->src));
		$img->src = "data/News/".$tenfile;
		$tin["urlHinh"] = $tenfile;	
	} 
	
	$tin['content'] = $content->innertext;
	$html->clear();
	unset($html);
	return $tin;
}

$urlwebsite="http://dantri.com.vn/c119/sucmanhso.htm";
$links=VnExpress_TrangChu($urlwebsite);
$urk = "http://dantri.com.vn";
VnExpress_Lay1Tin($urk,$urlwebsite);
set_time_limit(10); 


foreach ($links as $td => $url){
$tin=VnExpress_Lay1Tin($urk,$url);
echo $tin['tieude']."<br>";
   //echo $tin['content']; 
echo "<hr>";
   flush();
   LuuTinVaoDB($tin, $url,"dantri.com.vn");
next($links);
}


?>
