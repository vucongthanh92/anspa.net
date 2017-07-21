<div class="grid">

<!--phần nội dung danh mục sản phẩm nổi bật-->
<h2 class="title"><span>Sản Phẩm Quan Tâm</span></h2>
<div class="wap-product">
<?php
if(!empty($data['info'])){
	foreach($data['info'] as $item){
?>
	<div class="cate_item">
    	<div class="images"><a href="<?php echo BASE_URL."san-pham/".$item['alias'].".html"?>">
             <img title="<?php echo $item['title_vn'] ?>" alt="<?php echo $item['title_vn'] ?>" src="<?php echo BASE_URL."data/Product/".$item['images'];?>" class="lazy" /></a></div>
        <div class="info">
        	<h3><a href="<?=BASE_URL."san-pham/".$item['alias'];?>.html"><?php echo $item['title_vn'] ?></a></h3>
        </div>
    </div>
<?php }}?>
</div>

<!--phần nội dung bình luận của khách hàng-->
<div style="clear:both; height:10px;"></div>
<h2 class="title"><span>Đánh Giá Của Khách Hàng</span></h2>
<div class="adv">
	<?php 
	if(!empty($data['comment'])){
		while($item=mysql_fetch_assoc($data['comment'])){
	?>
	<div class="col-md-4">
         <div class="main_cmt_name"><?=$item['name']?></div>
         <div class="main_cmt_content"><?=$item['content_vn']?></div>
         <div class="main_cmt_line"></div>
    </div>
	<?php }} ?>
    <div class="main_cmt_readmore">Xem Thêm</div>
</div>

<!--hỗ trợ khách hàng-->
    <div style="clear:both;"></div>
    <section class="wrapper">
    <div class="box-active">
        <div class="box">
             <a href="<?=BASE_URL."bai-viet/chi-tiet/giao-hang.htm";?>">   
             <img alt="anspa.net" title="anspa.net" src="<?=BASE_URL."public/template/images/giao-hang.png"?>" />	
             <div class="box_title">Giao Hàng Tận Nơi</div>
             </a>
        </div>
        
        <div class="box" >	
             <a href="<?=BASE_URL."bai-viet/chi-tiet/huong-dan-mua-hang.htm";?>">  
             <img alt="anspa.net" title="anspa.net" src="<?=BASE_URL."public/template/images/mua-hang.png"?>" />	
             <div class="box_title">Hướng Dẫn Mua Hàng</div>
             </a>
        </div>
        
        <div class="box" style="margin-right:0px;">
             <img alt="anspa.net" title="anspa.net" id="icon_hotline" src="<?=BASE_URL."public/template/images/hotline.png"?>" />	
             <div class="box_title">Hotline: <span><?=$_SESSION['hotline']?></span></div>
             <a href="<?="skype:".$_SESSION['phone1']?>"><div class="skype_icon"><?=$_SESSION['name1']?></div></a>
             <a href="<?="skype:".$_SESSION['phone2']?>"><div class="skype_icon"><?=$_SESSION['name2']?></div></a>
        </div>
        <div style="clear:both;"></div>
    </div>
    </section>
    </div>

<div class="space_10"></div>
</div>