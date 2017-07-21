<div class="top_page">
     <div class="grid">
          <p id="breadcrumbs"> <?php echo $data['map_title'] ?></p>
          <!-- mô tả danh mục sản phẩm-->
          <h2 class="title"><span>Tìm Kiếm</span></h2>
          <div style="clear:both;"></div>
     </div>
</div>

<div class="grid" >
<div class="wap-product">

<?php 
	$j=0;$k=0;
	if(!empty($data['info'])){
		$i=0;
		foreach ($data['info'] as $item) {		
	?>
	<div class="itemp">
    	<div class="images"><a href="<?php echo '/san-pham/'.$item['alias'] ?>.html"><img src="<?=BASE_URL."data/Product/".$item['images']?>" 
        class="lazy" /></a></div>
        <div class="info">
        	<h3><a href="<?php echo '/san-pham/'.$item['alias'] ?>.html"><?php echo $item['title_vn'] ?></a></h3>
            <div class="code_pro">Mã sản phẩm: <?php echo $item['code_pro'];?></div>
            <p class="price">Giá: <?php if($item['price']>0) echo bsVndDot($item['price'])." VNĐ"; else echo "Liên hệ"; ?></p>
        </div>
        <div class="act">
        	<a href="/gio-hang.html/<?php echo $item['Id'] ?>" class="btn btn-default btnpayment">Đặt hàng</a>
            <a href="<?php echo '/san-pham/'.$item['alias'] ?>.html" class="btn btn-default btndetail">Chi tiết</a>
        </div>
    </div>
	<?php 
		}
	}else{ echo '<div class="alert alert-danger" style="margin-top:10px;">Không có dữ liệu</div>'; }	
if($data['page'] != "") {
	echo "<div class='space_5'></div>";
	echo "<div class = 'pages'>". $data['page']."</div>";
}
?>
<div class = "clear"></div>
</div>
</div>
