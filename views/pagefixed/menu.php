<script type="text/javascript" src="<?=USER_PATH_JS ?>jquery.sticky.js"></script>
  <script>
    $(window).load(function(){
      $("#sticky").sticky({ topSpacing: 0 });
    });
  </script>
<div  id="sticky" style="z-index: 99999999999999999999999999999999999999;">
<div id="menu">
<div id="smoothmenu1" class="ddsmoothmenu">
<ul>
    <li><a href="">Trang chủ</a></li>
    <!---<li><a href="gioi-thieu.html">Giới thiệu</a></li>--->
    <li style="z-index: 100;"><a href="san-pham.html" onclick="return false">Sản phẩm</a>
        <ul style="display: none; top: 43px; visibility: visible;">
        <?php
		$mcatelog = new Models_MCatelog();
			if(!empty($data['sanpham'])){
				foreach($data['sanpham'] as $item){
					$sub = $mcatelog->listdata('Id,title_en,title_'.lang, 'parentid = "'.$item['Id'].'" and ticlock = "0" ','sort asc, Id desc');
		?>
    	        <li><a href="<?=strtoseo($item['title_vn'])."-c".$item['Id'].".html" ?>"><?php  echo $item['title_'.lang] ?></a>
                <?php
				if(!empty($sub)){
					echo '<ul>';
					foreach($sub as $row){
				?>
                 <li><a href="<?=strtoseo($row['title_vn'])."-c".$row['Id'].".html" ?>"><?php  echo $row['title_'.lang] ?></a></li>
                <?php } echo '</ul>'; } ?>
                </li>
      	<?php }} ?>
            </ul>
        </li>
    <li><a href="cam-nang-giam-can-d1.html">Cẩm nang giảm cân</a>
         <ul style="display: none; top: 43px; visibility: visible;">
        <?php
			if(!empty($data['camnang'])){
				foreach($data['camnang'] as $item){
		?>
    	        <li><a href="<?=strtoseo($item['title_vn'])."-d".$item['Id'].".html" ?>"><?php  echo $item['title_'.lang] ?></a></li>
      	<?php }} ?>
            </ul>
    </li>
    <li><a href="thuc-don-giam-can-d2.html">Thực đơn giảm cân</a></li>
    <li><a href="cam-nang-lam-dep-d3.html">Cẩm nang làm đẹp</a></li>
    <li><a href="cam-nang-suc-khoe-d10.html">Cẩm nang sức khỏe</a></li>
    <li style="background-image: none;"><a href="hoi-dap-d12.html">Hỏi đáp</a></li>
</ul>
</div>

</div>
<div class="sub_menu">
<ul>
<?php
	if(!empty($data['sub'])){
		foreach($data['sub'] as $item){
			$sub2 = $mcatelog->listdata('Id,title_en,title_'.lang, 'parentid = "'.$item['Id'].'" and ticlock = "0" ','sort asc, Id desc');
?>
	<li><a href="<?=strtoseo($item['title_vn'])."-c".$item['Id'].".html"; ?>"><?=$item['title_'.lang] ?>
    <?php
	if(empty($sub2))
	{
		echo "</a>";
	}
	if(!empty($sub2)){
		echo "<img src='public/template/images/downdrop.png' /></a>
		  <ul>";
		  
		foreach($sub2 as $row){
	?>
    <li><a href="<?=strtoseo($row['title_vn'])."-c".$row['Id'].".html"; ?>"><?=$row['title_'.lang] ?></a></li>
    <?php } echo '</ul>'; } ?>
    </li>
<?php }} ?>
</ul>           
</div>
<div class="line_throut"></div>
<div class="div_search">
	<form action="tim-kiem.html" method="post">
    <select name="idcat">
    	<option value="0"> Chọn nhóm</option>
               <?php
				if(!empty($data['sanpham'])){
					foreach($data['sanpham'] as $item){
			?>
                <option value="<?= $item['Id']?>"><?=$item["title_vn"] ?></option>
        	 <?php }} ?>
            </select>
        <input type="text" name="tukhoa" class="txtinput" value="Nhập tên sản phẩm ..." onFocus="if(this.value=='Nhập tên sản phẩm ...') this.value='';" onBlur="if(this.value=='') this.value='Nhập tên sản phẩm ...';">
        <input type="image" src="public/template/images/btnsearch.png" style="margin-bottom:-7px;">
   
    <span class="hotline_m"><img src="public/template/images/phone.png"> Hotline: <span style="font-size:14px;"><?=$data['support']['hotline1'] ?> </span></span>
     </form>
</div>

</div>
