<div class="grid">
<div class="brackum"><?=$data['map_title']?></div>
<div class="wap_main  dkav">
<div class="form_dangnhap">
<h3 class="tib">Đăng nhập vào hệ thống</h3>
<div class="content_dn">
<!------------------------------------------>
 <form action="<?=BASE_URL."dang-nhap.html"; ?>" method="post">   
 	<center> 
  <?php
	 if($data['error']==1) {
			echo "<div class='error'>".$data['message']."</div>";
	}
	?>
  </center>
    <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
        	<td width="35%" align="right">
            	Tên đăng nhập <span class="red">*</span>
            </td>
            <td width="65%">
				<input   size="42" type="text" value="<?=$data['username'] ?>" name="username" />			</td>
        </tr>
		    
        <tr>
        
            <td  align="right">
                Password <span class="red">*</span>
            </td>
        
            <td>
                <input size="42" type="password" value="" name="password" id="password" />            </td>
        </tr>
      
        <tr>
         <td></td>
            <td >
				<input size="42" type="submit" value="Đăng nhập" name="btndangnhap" class="btnsubmit" />             </td>
        </tr>
    </table><!-- end table thong tin dang nhao -->
    
    <p  id="forgot"><a href="thanhvien/forgot.htm">Quên mật khẩu ?</a></p>
        
        </form>
</div>
</div>
<div class="form_dangky">
<!------------------------------------------> 
   <h3 class="tib">
    	Bạn  chưa có  tài khoản ?
    </h3>

	<p class="res"><a  href="/dang-ky.html">Đăng ký thành  viên</a></p>
       
</div>
<div class="space_10"></div>
</div>

</div>