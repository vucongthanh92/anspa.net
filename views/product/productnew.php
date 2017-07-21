<div id = 'pro'>
<div class = 'mappage'><h1><?php echo $data['map_title'];?></h1>
<?php
if($data['page'] != "")
	echo "<div class = 'paging'>".H_TRANG.": ". $data['page']."</div>";
?>
</div>
<?php
	if(!empty($data['pro'])){
		$i=-1;
		foreach($data['pro'] as $item)
		{
			if($item['title_'.lang] != ""){
				$title = unicode_convert($item['title_'.lang]);
			}else{
				$title = "san-pham.html";
			}
			$i++;
			if($i == 3){
				echo "<div style = 'clear:left;margin-top:10px;width:710px;height:15px;'></div>";
				$i=0;
			}
			
			if($i==3){
				$class2 = "style = 'margin:0;'";
			}else{
				$class2 = "";
			}
			
			if($item['price'] != 0){
				$gia = bsVndDot($item['price']).' '.$item['unit'];
			}else{
				$gia = 'Liên hệ';
			}
			
				echo '
				<div class = "motsanpham">
					<p><a href = "product/detail/'.$item['Id'].'/'.$title.'"><img src = "'.PATH_IMG_PRODUCT.$item['images'].'" width ="178" height = "115" class = "img"></p>
					<a href = "product/detail/'.$item['Id'].'/'.$title.'"><h2>'.$item['title_'.lang].'</h2></a>
					<p class = "gia">Giá: '.$gia.' </p>
					<p><a href = "payment/addcart/'.$item['Id'].'.htm");"><img src = "'.USER_PATH_IMG.'dathang.gif"></a></p>	
				</div>
			';
		}
	}

?>

</div>
<div id = 'thu'></div>