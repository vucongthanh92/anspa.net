<script type="text/javascript">
function CheckMail(email) {
	var rs = new RegExp("([A-Za-z0-9_.-]){2,}@([A-Za-z0-9_.-]){2,}.([A-Za-z0-9_.-]){2,}");
	if(email.match(rs) == null)
	return false;
	return true;
}
$(document).ready(function(){
	$(".news:last").css("border","none");
	$("#ctl00_cntMain_Newsletter1_btnSend").click(function(){
		if($("#emailgui").val() == ""){
			alert('Vui lòng nhập Email');
			return false;
		}
		else if(CheckMail($("#emailgui").val()) == false){
			alert('Email không đúng');
			return false;
		}
		else {
			//alert("asd");
			dulieu = "id="+$("#emailgui").val();
			//alert(dulieu);
			$.post("dangkyemail.php",dulieu,xuly)
		}
	});
})
function xuly(data){
	//alert(data);
	if(data=="OK"){ 
		alert("Đăng ký nhận bản tin thành công");
		window.location = '<?=BASE_URL ?>';
	}
	else {
		alert("Lỗi không thể đăng ký nhận bản tin");
	}
	
} //function xuly
</script>
<div class="wap_main">
<div class="grip_main">

<div id="left">
<h4 class="tieude"><?=GIOITHIEU ?></h4>
<div class="left_menu">
<?php
if(!empty($data['cat'])){
	foreach($data['cat'] as $item){
?>
<a href="gioithieu/chitiet/<?=$item["Id"]."-".unicode_convert($item['title_vn']) ?>" <?php if($data["idatv"]==$item["Id"]) echo "class='active'"; ?>><?=$item['title_'.lang] ?></a>
<?php }} ?>
</div>
<!------seacrch--------->
<div class="seacrh">
<form action="<?=BASE_URL?>gioithieu/timkiem.htm" method="post">
<input type="text" onblur="if (this.value=='') this.value='<?=TIMKIEM ?>';" onfocus="if (this.value=='<?=TIMKIEM ?>') this.value='';" class="searchInput" id="tukhoa" value="<?=TIMKIEM ?>" name="tukhoa">
<input  type="image" src="<?=USER_PATH_IMG ?>search_bt.jpg" />
</form>
</div>
<div class="lmod-link">
<ul class="noli">
    <li><a href="<?=BASE_URL ?>"><img src="<?=USER_PATH_IMG ?>ico-letter.png" alt="">  &nbsp; <?=BENHANDIENTU ?></a></li>
    <li><a href="<?=BASE_URL ?>dat-lich-kham.html"><img src="<?=USER_PATH_IMG ?>icon-boking.png" alt=""> &nbsp; <?=DATLICHKHAM ?> </a></li>
    <li><a href="<?=BASE_URL ?>dich-vu.html"><img src="<?=USER_PATH_IMG ?>icon-repaid.png" alt=""> &nbsp; <?=DICHVU ?></a></li>
</ul>
</div>
<div class="qc2-ben">
<?php
if(!empty($data['qcleft'])){
	foreach($data["qcleft"] as $row){
?>
<div class="item-qc">
<?php 
	if($row['style'] == 1){
	?>
	<embed wmode="transparent" width="<?=trim($row['width'])?>" height="<?=trim($row['height'])?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" src="<?php echo PATH_IMG_FLASH.$row['file_vn'];?>" play="true" loop="true" menu="true"></embed>
	<?php }else{?>
	<a href="<?=$row['link'] ?>" target="_blank" ><img src="<?=PATH_IMG_FLASH.$row['file_vn']?>" border="0" width="180" /></a>
	<?php }?>
</div>
<?php }} ?>
</div>

</div><!-------------end left------------------>


<div class="main">
<h3 class="title">
<img src="<?=USER_PATH_IMG ?>trangchu.jpg" style="margin-top:-3px; margin-right:5px;"  /><?php echo $data['map_title'];?></h3>
<div class="space_10"></div>
<div class = 'noidung-sp'>
<div class = 'detailnews'>
	
	<div style="width:98%; margin-left:5px; line-height:1.5em;">
	<?php echo stripslashes($data['news']['content_'.lang]);?></div>
</div>

<div class = 'thanhtienich'>
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style ">
	<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
	<a class="addthis_button_tweet"></a>
	<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
	<a class="addthis_counter addthis_pill_style"></a>
	<a href = 'javascript:window.history.go(-1);'><img src = '<?php echo USER_PATH_IMG;?>back.png' style = "vertical-align:middle;"> <?php echo H_TROVE;?></a>
	</div>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ee308cf5da86d1c"></script>
	<!-- AddThis Button END -->
	
</div>
<?php if(!empty($data['othernews'])){?>
<div class = 'cac-tin-khac'>
	<span  class = "title_new"><?=CACBAIVIETKHAC ?></span>
	<?php
		echo "<ul class = 'tinkhac'>";
		foreach($data['othernews'] as $item)
		{
			echo "<li><a href = 'gioithieu/chitiet/".$item['Id']."-".unicode_convert(stripslashes($item['title_'.lang]))."' title = '".$item['title_'.lang]."'>".$item['title_'.lang]."</a></li>";
		}
		echo "</ul>";
	?>
</div>
<?php }?>
</div>
</div>


<div id="right">
<h4 class="tieude"><?=YKIENKHACHHANG ?></h4>
<div class="cont_right_comment">
<?php
if(!empty($data["comment"])){
	foreach($data["comment"] as $item){
?>
<div class="for_cot_right">
<img src="<?=PATH_IMG_NEWS.$item['images'] ?>" width="60" align="left" />
<a href="comment/chitiet/<?php echo $item['Id']?>-<?php echo unicode_convert(stripslashes($item['title_'.lang]))?>"><?=$item["title_".lang] ?></a>
<?=limit_text($item["content_".lang],300); ?>
</div>
<?php }} ?>
</div>

<div class="space_10"></div>
<h4 class="tieude"><?=DANGKYNHANBANTIN ?></h4>
<div class="wget-content">
<div class="wrap03">
    <?=NOTEBANTIN ?>
</div>
<div class="newsletter-frm">
    <input type="text" class="riTextBox" size="20" maxlength="50" name="emailgui" id="emailgui">
    <input type="button" class="nl-submit" id="ctl00_cntMain_Newsletter1_btnSend"  value="<?=GUI ?>" name="btnregisteremail">
</div>
<div class="wrap02">
    <img src="<?=USER_PATH_IMG ?>icon_share.png" style="width: 169px; height: 26px; border-width: 0px; border-style: solid;" usemap="#rade_img_map_1350029736861" alt=""><map id="rade_img_map_1350029736861" name="rade_img_map_1350029736861">
<area shape="RECT" coords="45,1,66,29" href="https://twitter.com/" target="_blank">
<area shape="RECT" coords="67,0,91,31" href="https://accounts.google.com" target="_blank">
<area shape="RECT" coords="23,0,43,29" href="http://facebook.com" target="_blank">
<area shape="RECT" coords="0,0,19,30" href="" target="_blank"></map>  
</div>
</div>

<div class="qc2-ben">
<?php
if(!empty($data['qcright'])){
	foreach($data["qcright"] as $row){
?>
<div class="item-qc">
<?php 
	if($row['style'] == 1){
	?>
	<embed wmode="transparent" width="<?=trim($row['width'])?>" height="<?=trim($row['height'])?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" src="<?php echo PATH_IMG_FLASH.$row['file_vn'];?>" play="true" loop="true" menu="true"></embed>
	<?php }else{?>
	<a href="<?=$row['link'] ?>" target="_blank" ><img src="<?=PATH_IMG_FLASH.$row['file_vn']?>" border="0" width="180" /></a>
	<?php }?>
</div>
<?php }} ?>
</div>


</div><!-------------end right------------------>

<div class="space_10"></div>
</div></div><!-----------wap main-------------------------->

