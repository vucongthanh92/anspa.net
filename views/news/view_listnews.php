<div class="top_page">
    <div class="grid">
         <div class="col-md-12">
             <p id="breadcrumbs"> <?php echo $data['map_title'] ?></p>    
             <h2 class="title"><span><?php echo $data['cat']['title_vn'] ?></span></h2>           
         </div>
    </div>
</div>

<div class="space_10"></div>
<div class="grid">
<div class="tintuc_row">
	 <div class="news_content">
     <?php
	 if(!empty($data['info'])){
		foreach($data['info'] as $item){
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
     </div>
     <!-- new blog -->
     <?php }} ?>
    
     <div class="pages">
         <?php if(!empty($data['page'])) echo $data['page']; ?>
     </div>
     
     <!--phần sản phẩm quan tâm và hướng dẫn mua hàng-->
     <div class="space_10"></div>
     <?php loadview('pagefixed/partners',$partners)?>
     
    </div>
</div>
</div>
<div class="space_10"></div>