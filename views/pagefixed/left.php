<div class="left grid220">
<?php
$mcat = new Models_MCatNews;
$mnews = new Models_MNews();
$danhmuc = $mcat->listdata('*', 'Id != "4" and ticlock = "0" ','sort asc, Id desc',5);
if(!empty($danhmuc)){
	foreach($danhmuc as $row){
		$news = $mnews->listdata('*', 'idcat = "'.$row['Id'].'" and ticlock = "0" ','sort asc, Id desc');
?>
<div class="box">
	<h2><?php echo $row['title_vn']?></h2>
    <div>
    <?php 
	if(!empty($news)){
		foreach($news as $item){
	?>
    <p><a href="/bai-viet/<?php echo  $item['alias']?>" <?php if($_GET['id']== $item['alias']) echo 'class="selected"'; ?>><?php echo $item['title_vn'] ?></a></p>
    <?php }} ?>
    </div>
</div>
<?php }} ?>

</div>