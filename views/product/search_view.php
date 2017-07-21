<div class="grid" >
<div class="brackum"><?php echo $data['map_title']?></div>
<div class="wap-product">

<?php 
	$j=0;$k=0;
	
	/*
	 * san pham sieu cap
	 */
	if(!empty($data['pro_1'])){
		$i=0;
		foreach ($data['pro_1'] as $item) {		
	?>
	<div class="items-product">
<div class="images">
	<a href="<?php echo BASE_URL.$item['alias'] ?>">
    <img  data-original="/<?php echo PATH_IMG_PRODUCT.$item['images'] ?>" class="lazy" />
    </a>
</div>
<p class="price"><?php echo bsVndDot($item['price'])." ".$item['unit']; ?></p>
<h2><a href="<?php echo BASE_URL.$item['alias'] ?>"><?php echo $item['title_vn']; ?></a></h2>
<p class="readmore"><a href="<?php echo BASE_URL.$item['alias'] ?>"> Xem chi tiết > </a></p>
</div>
	<?php 
		}
	}
	
if($data['page'] != "") {
	echo "<div class = 'padding'>". $data['page']."</div>";
}
?>
<div class = "clear"></div>
</div>
</div>
