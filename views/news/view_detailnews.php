<div class="top_page">
    <div class="grid">
        <div class="detailnews_top">
             <p id="breadcrumbs"> <?php echo $data['map_title'] ?></p> 
             <h2 class="title"><span><?php echo $data['cat']['title_vn'] ?></span></h2>              
        </div>
    </div>
</div>
<div class="space_10"></div>
<div class="grid">
<div class="detailnews_main">
    <div class="left_about">
    <article>
    <footer class="entry-meta">
            <h3><?php echo $data['news']['title_vn'] ?></h3>    
    </footer>
    <div class="clearfix"></div>
    	<?php echo $data['news']['content_vn']; ?>
    </article>
    <div class="comment">
    	<div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-comments" data-href="<?php echo CURRENT_URL; ?>" data-width="100%" data-numposts="5"></div>
    </div>
    
    <!---------------------->
    <div class="tin-lien-quan">
    <h2 class="title"><span>Bài Viết Liên Quan</span></h2> 
    <div class="news_content">
    <?php
	if(!empty($data['othernews'])){
		foreach($data['othernews'] as $item){
	?>
       <div class="new_blog">
          <div class="news_box">
              <img class="news_img" src="<?php echo PATH_IMG_NEWS.$item['images']; ?>" class="img-responsive lazy" alt="cuatrinhnu">
              <div class="news_info">
                  <a href="<?php echo "tin-tuc/chi-tiet/".$item['alias'].".htm"; ?>">
                  <div class="news_title"><?php echo $item['title_vn']; ?></div></a>           
                  <div class="news_des"><?php if($item['description_vn']!="") echo limit_text($item['description_vn'],200)."..."; ?></div>
              </div>
          </div>                        	
       </div> <!-- new blog -->
    <?php }} ?>
    </div> 
    </div>
    <!--end row-->
    <div style="clear:both; height:20px;"></div>
    
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
             <img style="width:75px;" src="<?=BASE_URL."public/template/images/hotline.png"?>" />	
             <div class="box_title">Hotline: 0972 168 805</div>
             <a href="<?="skype:".$_SESSION['phone1']?>"><div class="skype_icon"><?=$_SESSION['name1']?></div></a>
             <a href="<?="skype:".$_SESSION['phone2']?>"><div class="skype_icon"><?=$_SESSION['name2']?></div></a>
        </div>
        <div style="clear:both;"></div>
    </div>
    </section>
    </div>
    <div class="space_10"></div>
    
</div>
</div>

        
