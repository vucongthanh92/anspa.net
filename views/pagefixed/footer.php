<?php
    if(isset($_POST['btn_submit']))
	{
		$email=$_POST['email'];
		$sql="select * from mn_email where email='$email'";
		$ds=mysql_query($sql) or die(mysql_error());
		$row=mysql_num_rows($ds);
		if($row>=1)
		{
			echo "<script>alert('Email này đã được đăng ký')</script>";
		}
		else
		{
			$sql2="insert into mn_email(email) values ('$email')";
			mysql_query($sql2) or die(mysql_error());
			echo "<script>alert('Đăng ký nhận email thành công')</script>";
		}
	}
?>

<footer id="col-footer">
	<div class="grid">
         <div class="col-xs-6 col-sm-3">
              <h3>Hỗ Trợ Khách Hàng</h3>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/huong-dan-mua-hang.htm';?>">Hướng Dẫn Mua Hàng</a></p>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/giao-hang.htm';?>">Giao Hàng</a></p>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/thanh-toan.htm';?>">Thanh Toán</a></p>
         </div>
         
         <div class="col-xs-6 col-sm-3">
              <h3>Tất Cả Về Tinh Dầu</h3>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/hop-tac.htm';?>">Hợp Tác</a></p>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/cam-ket-chat-luong.htm';?>">Cam Kết Chất Lượng</a></p>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/lich-su-phat-trien.htm';?>">Lịch Sử Phát Triển</a></p>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/gioi-thieu.htm';?>">Giới Thiệu</a></p>
         </div>
         
         <div class="col-xs-6 col-sm-3">
              <h3>Kết Nối Với Chúng Tôi</h3>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/he-thong-phan-phoi.htm';?>">Hệ Thống Phân Phối</a></p>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/bao-gia-nhanh.htm';?>">Báo Giá Nhanhh</a></p>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/chinh-sach-bao-mat.htm';?>">Chính Sách Bảo Mật</a></p>
              <p><a href="<?php echo BASE_URL.'bai-viet/chi-tiet/co-the-ban-quan-tam.htm';?>">Có Thể Bạn Quan Tâm</a></p>
         </div>
  
         <div class="col-xs-6 col-sm-3">
              <h3>Đăng Ký Nhận Mail</h3>
              <div class="send_mail_info">Nhận tin khuyến mại, Voucher, giảm giá và những sản phẩm mới nhất </div>
              <form action="" method="post">
              <div class="sendmail_box">
                   <input type="text" id="sendmail_email" name="email" placeholder="Email của bạn" value="" />
                   <input type="submit" id="sendmail_submit" name="btn_submit" value="" />
              </div>
              </form>
              <div class="social_box">
                   <a href=""><img src="<?=BASE_URL."public/template/images/fb.png";?>" alt="anspa" title="anspa" /></a>
                   <a href=""><img src="<?=BASE_URL."public/template/images/gg.png";?>" alt="anspa" title="anspa" /></a>
                   <a href=""><img src="<?=BASE_URL."public/template/images/youtube.png";?>" alt="anspa" title="anspa" /></a>
                   <a href=""><img src="<?=BASE_URL."public/template/images/skype.png";?>" alt="anspa" title="anspa" /></a>
                   <a href=""><img src="<?=BASE_URL."public/template/images/tw.png";?>" alt="anspa" title="anspa" /></a>
              </div>
         </div>
    	 <div class="clear"></div>
    </div>          
	</div>
</footer>

<div class="copy-right">
     <div class="copy_content">
          <?php echo stripcslashes($data['info']['content_vn']); ?>
          <p id="copy_chuky">Coppyright © 2015 <a href="<?=BASE_URL?>">Anspa.net</a>. All Rights Reserved - Design by 
          <a href="http://www.thietke247.com/">thietke247.com</a></p>
     </div>
</div>