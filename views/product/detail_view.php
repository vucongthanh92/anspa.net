<div class="top_page">
    <div class="detail_prod">
         <div class="row">
            <div class="col-md-12">
                 <p id="breadcrumbs"> <?php echo $data['map_title'] ?></p>             
            </div>
         </div>
    </div>
</div>

<div class="space_10"></div>
<div class="detail_prod">
<div class="row">
	<div class="col-md-8 col-sm-8 col-xs-12">
    <div class="left_about product-detail">
    <div class="image">
    	<a href="<?php echo PATH_IMG_PRODUCT.$data['prod']['images'] ?>" rel="prettyPhoto[gallery1]" title="<?php echo $data['prod']['title_vn']; ?>">
        <img src="<?php echo PATH_IMG_PRODUCT.$data['prod']['images'] ?>"/>
        </a>
        <ul class="gallery clearfix">
        	<?php if($data['prod']['images1']!=""){ ?>
			<li><a href="<?php echo PATH_IMG_PRODUCT.$data['prod']['images1'] ?>" rel="prettyPhoto[gallery1]" 
                title="<?php echo $data['prod']['title_vn']; ?>">
            <img src="<?php echo PATH_IMG_PRODUCT.$data['prod']['images1'] ?>" />
            </a></li>
            <?php } ?>
		</ul>
    </div>
    <div class="sumary">
    	<h1  class="product_title entry-title"><?php echo $data['prod']['title_vn']; ?></h1>
        <div class="border-bottomx">
        <div class="detail_codepro">Mã sản phẩm: <?=$data['prod']['code_pro'];?></div>
        <div class="pull-left">Đơn giá: <span><?php echo bsVndDot($data['prod']['price']) ?> VNĐ</span></div> 
        <div style="clear: both"></div></div>
    	<div class="detail-mota"><?php echo stripcslashes($data['prod']['description_vn']); ?></div>
        <div class="order-div">
        <div class="quantity">Số lượng: <input type="number" step="1" min="1" name="quantity" value="1" title="SL" class="input-text 
        qty-text" size="4" style="width:50px;"></div>
        <button type="submit" class="single_add_to_cart_button button alt">Đặt Hàng</button>
        </div>
    </div>
    <div style="clear:both; height:20px"></div>
    <div class="woocommerce-tabs">
    	<h4 class="title-thong-tin-them">Thông Tin Thêm</h4>
        <?php echo stripcslashes($data['prod']['content_vn']); ?>
    </div>
    <div class="clear"></div>
    <div class="comment-face">
    	<div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-comments" data-href="<?php echo CURRENT_URL;?>" data-width="100%" data-numposts="5"></div>
    </div>
   
    </div>
    <!---------------------->
    </div>
    </div>
    
    <!--phần nội dung danh mục sản phẩm nổi bật-->
    <h2 class="title"><span>Sản Phẩm Quan Tâm</span></h2>
    <div class="wap-product">
    <?php
    if(!empty($data['info'])){
        foreach($data['info'] as $item){
    ?>
        <div class="cate_item">
            <div class="images"><a href="<?php echo '/san-pham/'.$item['alias'] ?>.html">
                 <img src="<?php echo BASE_URL."data/Product/".$item['images'];?>" class="lazy" /></a></div>
            <div class="info">
                <h3><a href="<?php echo '/san-pham/'.$item['alias'] ?>.html"><?php echo $item['title_vn'] ?></a></h3>
            </div>
        </div>
    <?php }}?>
    </div>
    
    <!--hỗ trợ khách hàng-->
    <div style="clear:both;"></div>
    <section class="wrapper">
    <div class="box-active">
        <div class="box">   
             <img src="<?=BASE_URL."public/template/images/giao-hang.png"?>" />	
             <div class="box_title">Giao Hàng Tận Nơi</div>
        </div>
        
        <div class="box" >	
             <img src="<?=BASE_URL."public/template/images/mua-hang.png"?>" />	
             <div class="box_title">Hướng Dẫn Mua Hàng</div>
        </div>
        
        <div class="box" style="margin-right:0px;">
             <img src="<?=BASE_URL."public/template/images/hotline.png"?>" />	
             <div class="box_title">Hotline: 0972 168 805</div>
        </div>
        <div style="clear:both;"></div>
    </div>
    </section>
    
    
</div>
</div>
<div class="space_10"></div>
<link rel= "stylesheet" type = "text/css" href = "<?php echo USER_PATH_CSS;?>prettyPhoto.css" />
	<script type="text/javascript" src="<?php echo USER_PATH_JS;?>jquery.prettyPhoto.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$(".image a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
	$('.single_add_to_cart_button').click(function(){
		s = $('.qty-text').val();
		url = "<?php echo BASE_URL ?>gio-hang.html/<?php echo $data['prod']['Id']; ?>/"+s;
		window.location = url;
	});
	
});
</script>