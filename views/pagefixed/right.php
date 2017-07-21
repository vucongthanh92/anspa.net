<? $mcatelog = new Models_MCatelog(); ?>
<div id="right">
	
	<h2 class="title"><?=HOTROTRUCTUYEN ?></h2>
    <Div class="box">
		<div class="support">
		<p style="height:10px;"></p>
        <p></p>
        <p ><a href="ymsgr:sendim?<?=$data['support']['yahoo1']?>"> <img border="0" src="http://opi.yahoo.com/online?u=<?=$data['support']['yahoo1']?>&m=g&t=1&l=us" ></a>
        <a href="ymsgr:sendim?<?=$data['support']['yahoo2']?>"> <img border="0" src="http://opi.yahoo.com/online?u=<?=$data['support']['yahoo2']?>&m=g&t=1&l=us" ></a></p>
        <p class="dt"><img src="<?=USER_PATH_IMG ?>phone.jpg" style="margin-bottom:-5px;" /> <?=$data['support']['kddienthoai'] ?> -  <?=$data['support']['kdten'] ?></p> 
        <p class="dt"><img src="<?=USER_PATH_IMG ?>phone.jpg" style="margin-bottom:-5px;" /> <?=$data['support']['ktoandienthoai'] ?> -  <?=$data['support']['ktoanten'] ?></p>   
           <p class="email"><img src="<?=USER_PATH_IMG ?>email.jpg" /> 
		  <a href="mailto: <?=$data['support']['kdemail'] ?>"> 
		   <?=$data['support']['kdemail'] ?></a></p>  
        </div>
	<p style="height:10px;"></p>
	</div>		
	<div class="space_5"></div>
    <h2 class="title"><?=TIMKIEMNHANH ?></h2>
		<div class="box">
        <form action="sanpham/timkiem.htm" method="post">
		<table width="90%" border="0" cellspacing="0" cellpadding="0" class="taseach">
          <tr>
            <td><input type="text" name="tukhoa" value="<?=TUKHOA ?>" onfocus="if(this.value=='<?=TUKHOA ?>') this.value='';" onblur="if(this.value=='') this.value='<?=TUKHOA ?>';"  /></td>
          </tr>
          <tr>
            <td>
            <select name="idcat" class="select_bou" id="idcat">
            <option value="0" > <?=CHONNHOMSANPHAM ?> </option>
                    <?php 
					if(!empty($data['danhmuc'])){
						foreach ($data['danhmuc'] as $item){
					?>
                    <option value="<?=$item['Id'] ?>"><?=$item['title_'.lang] ?></option>
                   <?php 
				   $rws = $mcatelog ->listdata('Id,title_'.lang.',parentid', 'ticlock = "0" AND 	parentid='.$item['Id'],'sort asc, Id desc');
	 				 if(!empty($rws)) {
						  foreach ($rws as $sub2) {
				   ?>
                   <option value="<?=$sub2['Id'] ?>">++<?=$sub2['title_'.lang] ?></option>
                    <?php
						  }} 
						  
					}}
					?>
                </select>
            </td>
          </tr>
          <tr>
            <td align="right"><input type="submit" name="btnseach" value="<?=TIM ?>"  /></td>
          </tr>
        </table>
		</form>
		
		</div>

		<!-- end sp ban chay -->
        <div class="space_5"></div>
        <h2 class="title"><?=SANPHAMMOI ?></h2>
        <div class="box">
        <marquee direction="up" width="100%" height="300" onmouseover="this.stop()" onmouseout="this.start()">
        <div style="overflow:hidden">
		<?php 
		if(!empty($data['sanpham'])){
			foreach ($data['sanpham'] as $item) {
		?>
			<div class="pro">
				<a href="<?=unicode_convert2($item['title_'.lang])?>-c<?=$item['Id']?>.html" title="<?=stripslashes($item['title_'.lang])?>"><img src="<?=PATH_IMG_PRODUCT.$item['images']?>" width="181" height="143"></a>
				<a href="<?=unicode_convert2($item['title_'.lang])?>-c<?=$item['Id']?>.html" title="<?=stripslashes($item['title_'.lang])?>"><?=cut_string(stripslashes($item['title_'.lang]), 200, 3)?></a>
			</div>
		<?php 
			}
		}
		?>
        </div>
        </marquee>
        </div>
		<!------------
		<div class="space_5"></div>
        <h2 class="title"><?=LIENKETWEBSITE ?></h2>
        <div class="box" id="linkket">
		<select onchange="javascript:window.open(this.value);" name="web" id="weblink">
        <option value="<?=BASE_URL ?>">--- <?=LIENKETWEBSITE ?>---</option>
        <?php if(!empty($data['link'])) { 
				foreach($data["link"] as $row){
					if(strlen($row['link'])>0){
		?>
        <option value="<?php echo $row['link']; ?>">
        <?php echo $row["title_".lang];?>
        </option>
        <?php
				}}}
		?>
        </select>
        </div>------------------>
        
		<div class="space_5"></div>
        <h2 class="title"><?=QUANGCAO ?></h2>
        <div class="box" id="quangcao">

			<?php 

	        if(!empty($data['qc'])){

	        	foreach ($data['qc'] as $item){

	        		

	        ?>

	        	<a href = "<?=$item['link']?>" target="_blank">
                <img src="data/Flash/<?=$item['file_vn']?>"/></a>

	       

	        <?php 


	        	}

	        }

	        ?>

		</div>

    <div class="clear"></div>

</div>

