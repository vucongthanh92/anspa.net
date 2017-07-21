<div class="top_page">
    <div class="grid">
        <div class="detailnews_top">
             <p id="breadcrumbs"> <?php echo $data['map_title'] ?></p>   
             <h2 class="title"><span><?php echo $data['info']['title_vn'] ?></span></h2>   
        </div>
    </div>
</div>

<div class="space_10"></div>
<div class="grid">
<div class="detailnews_main">
     <div class="left_about">
        <?php echo stripcslashes($data['info']['content_vn']); ?>
        </div>
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
	<div class="col-md-4 col-sm-4 col-xs-12 right_about">
        <div class="face-box">
        <div id="fb-root"></div>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100009753465566&fref=ts" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/profile.php?id=100009753465566&fref=ts"><a href="https://www.facebook.com/profile.php?id=100009753465566&fref=ts">AnSpa</a></blockquote></div></div>
      </div>

     </div>
     
     <!--phần sản phẩm quan tâm và hướng dẫn mua hàng-->
      <div class="space_10"></div>
      <?php loadview('pagefixed/partners',$partners)?>
     
    <div class="clear"></div>
</div>
<div class="space_10"></div>