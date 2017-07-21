<div class="grid bg_slide">
<div class="wap-slide">
    <div class="theme-default">
    <div id="slider" class="nivoSlider ">
    <?php
    if(!empty($data['slide'])){
        foreach($data['slide'] as $item){
    ?>
    <a href="<?php echo $item['link']?>" target="_blank"><img  src="<?php echo PATH_IMG_FLASH.$item['file_vn'] ?>" border="0" /></a>
    <?php }} ?>
   </div>
   </div>
</div>

</div>
<link rel="stylesheet" href="/<?php echo USER_PATH_CSS; ?>default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/<?php echo USER_PATH_CSS; ?>nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript" src="/<?php echo USER_PATH_JS; ?>jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({ controlNav: false,});
});
</script>