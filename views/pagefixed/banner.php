<!--phần thông tin header-->
<div class="swp-head">

<!--phần banner main-->
<div class="grid">
    <!--phần logo trái-->
	<div class="col-md-3 col-sm-3 col-xs-12 fg-logo"><a href="/">
         <img alt="anspa.net" title="anspa.net" src="<?php echo PATH_IMG_FLASH.$data['logo']['file_vn']; ?>" id="logo_header" title="anspa" 
              class="img-responsive" /></a>
    </div>
    
    <div class="col-md-3 col-sm-3 col-xs-12 fg-logo"><a href="/">
         <img alt="anspa.net" title="anspa.net" src="<?php echo PATH_IMG_FLASH.$data['slogan']['file_vn']; ?>" id="slogan_header" title="anspa" 
              class="img-responsive" /></a>
    </div>
    
    <!--phần banner phải-->
    <div class="menu-header">
    	 <div class="left hotline">
        	  <a href="<?=BASE_URL?>"><img id="hotline_home" src="<?=BASE_URL."public/template/images/header_icon1.png"?>" alt="anspa" title="anspa" />
              </a>
              <a href="<?=BASE_URL."bai-viet/chi-tiet/ban-do.htm"?>">
                 <img id="hotline_map" src="<?=BASE_URL."public/template/images/header_icon2.png"?>" alt="anspa" title="anspa" /></a>
              <a href="<?=BASE_URL."lien-he.html"?>"><img id="hotline_lienhe" src="<?=BASE_URL."public/template/images/header_icon3.png"?>" alt="anspa.net"
              title="anspa.net" /></a>
    	 </div>
         <div class="right">
        	<ul class="nav navbar-nav">
            <li class="dropdown">
            <form method="post" action="<?=BASE_URL."san-pham/tim-kiem.htm"?>">
                  <div id="search_box"><h1>
                       <input type="text" name="search_tukhoa" id="search_tukhoa" value="" placeholder="từ khóa tìm kiếm" />
                       <input type="submit" name="search_tim" id="search_tim" value="" />
                  </h1></div>
            </form>
            </li>
            <li class="cart-show"><a href="<?=BASE_URL."gio-hang.html"?>">
            <img id="header_cart" title="anspa" src="<?=BASE_URL."public/template/images/shopping_cart.png"?>" alt="anspa" title="anspa" />
			<?php 
			    if($data['tong']>0) echo $data['tong']." sản phẩm: ".bsVndDot($data['tientong'])."VNĐ";
				else echo "Giỏ hàng trống";
			?></a></li>
            </ul>
         </div>
         <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div>
</div>
</div>

<!--phần menu header-->
<div id="menu_main">
<div class="col-md-9 col-sm-9 col-xs-12 fg-menu">
     <!--menu cho bản mobile-->
     <a class="mobile_toggle">
        <span class="mobile_button">
            Menu &nbsp;
            <span class="symbol_menu">≡</span>
            <span class="symbol_cross">╳</span>
        </span><!-- class="mobile_button" -->
     </a>
     
     <div id="menu_mobile">
     <ul class="mega_main_menu">
         <?php
            if(!empty($data['danhmuc'])){
            foreach($data['danhmuc'] as $item){
         ?>
         <li><a href="<?=BASE_URL.$item['alias'].".html"?>">
		     <?=$item['title_vn']?>
             </a>
         <ul>
		 <?php
              $id=$item['Id'];
			  $sql="select * from mn_catelog where parentid='$id' and ticlock='0'";
			  $ds=mysql_query($sql) or die(mysql_error());
			  while($item2=mysql_fetch_assoc($ds)) {
         ?>
              <li><a href="<?=BASE_URL.$item2['alias'].".html"?>">
			  <?php echo $item2['title_vn'] ?></a></li>
         <?php } ?>
         </ul></li>
         <?php }} ?>
         <!---------------------->
         
         <!--danh mục tin tức-->
         <?php
              $sql2="select * from mn_catnews where ticlock='0' and parentid='0' order by Id asc";
			  $ds2=mysql_query($sql2) or die(mysql_error());
			  while($row2=mysql_fetch_assoc($ds2)) {
         ?>
         <li><a href="<?=BASE_URL."tin-tuc/danh-muc/".$row2['alias'].".htm"?>"><?=$row2['title_vn']?></a>
         <ul>
			 <?php
                  $id_news=$row2['Id'];
                  $sql3="select * from mn_catnews where parentid='$id_news' and ticlock='0'";
                  $ds3=mysql_query($sql3) or die(mysql_error());
                  while($row3=mysql_fetch_assoc($ds3)) {
             ?>
                  <li><a href="<?=BASE_URL."tin-tuc/danh-muc/".$row3['alias'].".htm"?>">
                  <?php echo $row3['title_vn'] ?></a></li>
             <?php } ?>
         </ul></li>
         <?php } ?>
     </ul>
     </div>
     <!------------------------>
     
     <!--menu cho bản desktop-->
     <ul id="menu_desktop" class="mega_main_menu">
         <!--danh mục sản phẩm-->
         <?php
            if(!empty($data['danhmuc'])){
            foreach($data['danhmuc'] as $item){
         ?>
         <li><a href="<?=BASE_URL.$item['alias'].".html"?>"><?=$item['title_vn']?></a>
         <ul>
		 <?php
              $id=$item['Id'];
			  $sql="select * from mn_catelog where parentid='$id' and ticlock='0'";
			  $ds=mysql_query($sql) or die(mysql_error());
			  while($item2=mysql_fetch_assoc($ds)) {
         ?>
              <li><a href="<?=BASE_URL.$item2['alias'].".html"?>">
			  <?php echo $item2['title_vn'] ?></a></li>
         <?php } ?>
         </ul></li>
         <?php }} ?>
         <!---------------------->
         
         <!--danh mục tin tức-->
         <?php
              $sql2="select * from mn_catnews where ticlock='0' and parentid='0' order by Id asc";
			  $ds2=mysql_query($sql2) or die(mysql_error());
			  while($row2=mysql_fetch_assoc($ds2)) {
         ?>
         <li><a href="<?=BASE_URL."tin-tuc/danh-muc/".$row2['alias'].".htm"?>"><?=$row2['title_vn']?></a>
         <ul>
			 <?php
                  $id_news=$row2['Id'];
                  $sql3="select * from mn_catnews where parentid='$id_news' and ticlock='0'";
                  $ds3=mysql_query($sql3) or die(mysql_error());
                  while($row3=mysql_fetch_assoc($ds3)) {
             ?>
                  <li><a href="<?=BASE_URL."tin-tuc/danh-muc/".$row3['alias'].".htm"?>">
                  <?php echo $row3['title_vn'] ?></a></li>
             <?php } ?>
         </ul></li>
         <?php } ?>
         <!---------------------->
         
     </ul>
</div>
</div>
<div class="clear"></div>