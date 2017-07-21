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
			
			echo "<div class = 'onepro' $class2 >
					<div class = 'bgimgpro'><a href = '".BASE_URL."product/detail/".$item['Id']."/".$title."'><img src = '".BASE_URL."data/Product/".$item['images']."' width = '126' height = '122'></a></div>
					<div class = 'motalistpro'>
						<div class = 'pricepro'><span>".bsVndDot($item['price'])."&nbsp;".$item['unit']."</span></div>
						<div class = 'hnoidung'>
							<p><a href = '".BASE_URL."product/detail/".$item['Id']."/".$title."'><b>".$item['title_'.lang]."</b></a></p>
							<p>".R_KICHTHUOC.": ".$item['kichthuoc_'.lang]."</p>
							<p>".R_LOAI.": ".$item['loai_'.lang]."</p>
							<p>".R_UNGDUNG.": ".$item['description_'.lang]."</p>
						</div>
						<div class = 'dathang'><a href = 'javascript:addcart(\"soluongsp\",\"".$data['tongcart']."\",\"thu\",\"".$item['Id']."\");'><img src = '".USER_PATH_IMG."giohang.jpg'>&nbsp;".R_DATHANG."</a></div>
					</div>
				</div>";
		}
	}

?>

</div>
<div id = 'thu'></div>