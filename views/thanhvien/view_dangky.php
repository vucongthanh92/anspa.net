<div class="grid">
<div class="brackum"><?=$data['map_title']?></div>
<div class="wap_main  dkav">
 <form action="<?=BASE_URL."dang-ky.html" ?>" method="post">  
<div class="form_dangky">
<!------------------------------------------>
  
   <h3 class="tib">
    	Đăng ký thành viên
    </h3>
   
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
				<input   size="42" type="text" value="<?=$data['username1'] ?>" name="username" />			</td>
        </tr>
		    
        <tr>
        
            <td  align="right" >
                Password <span class="red">*</span>
            </td>
        
            <td>
                <input size="42" type="password" value="" name="password" id="password" />            </td>
        </tr>
        
        <tr>
            <td  align="right" >
                Gõ lại Password <span class="red">*</span>
            </td>
            <td>
				<input size="42" type="password" value="" name="repassword" id="repassword" />             </td>
        </tr>
    </table><!-- end table thong tin dang nhao -->
    
     <h3 class="tib">
    	Thông tin cá nhân
    </h3>
    
    <table width="100%" border="0" cellspacing="1" cellpadding="3">
		<tr>
            <td width="35%"  align="right"  >
                Họ và tên <span class="red">*</span>
            </td>
            
			<td>
				<input size="42" type="text" value="<?=$data['full_name'] ?>" name="full_name" id="full_name" />             </td>
         </tr>
          <tr>
        	<td width="35%" align="right"  >
            	Email <span class="red">*</span>
            </td>
            <td width="65%">
				<input size="42" type="text" value="<?=$data['email'] ?>" name="email" />			</td>
        </tr>
         <tr>
         	<td align="right" >
            	Địa chỉ <span class="red">*</span>
            </td>
            
			<td>
				<input size="42" type="text" value="<?=$data['address'] ?>" name="address" id="address" />             </td>
		  </tr> 
          <tr>
			<td  align="right">
            	Điện thoại 
            </td>
				<td>
					<input size="42" type="text" value="<?=$data['phone'] ?>" name="phone" id="phone" />              	</td>
		  </tr>
          
           <tr height="10px">
				<td  align="right" valign="top" height="10px"></td>
				<td  height="10px">
					<div style='color:#555; font-size:11px; padding:0px 0 5px 10px'>Vui lòng nhập chính xác thông tin để chúng tôi phục vụ quý khách tốt hơn. </div>              	</td>
		  </tr>
          
		  <tr>
			<td  align="right">Ngày sinh </td>
			<td>
				<input size="3" type="text" value="<?=$data['ngay'] ?>" name="ngay" id="ngay" />&nbsp;&nbsp;Tháng <input size="3" type="text" value=""<?=$data['thang'] ?> name="thang" id="thang" />&nbsp;&nbsp;Năm <input size="5" type="text" value="<?=$data['nam'] ?>" name="nam" id="nam" /> 
                 <!-- <span style="color:#f00"><em>yyyy-mm-dd</em></span> -->
			
			</td>
		  </tr>
          
		  <tr>
			<td  align="right"  >Giới tính</td>
			<td> 
					<img src="<?=USER_PATH_IMG ?>man.png"  />
						<input value="1" checked="checked" type="radio" name="gender" id="gender" /> 
					<img src="<?=USER_PATH_IMG ?>women.png"  />
					<input value="0" type="radio" name="gender" id="gender" /> 
			
			</td>
		  </tr>
          
      
          
		  <tr>
			<td>&nbsp;</td>
			<td>
			<input id="bt_submitregister" type="submit" name="yt0" value="Đăng ký" class="btnsubmit" />&nbsp;			</td>
		  </tr>
		</table>
        	
       
       
</div>
<div class=" ri-ax">

<div class="text-dk">
<p style="margin:0px; color:#333; text-transform:uppercase;">Điều khoản đăng ký thành viên</p>
<?php echo stripcslashes($data['infos']['content_vn']);?>
</div>
<input type="checkbox" value="1" name="checkdk" /> <b style="font-size:13px;">Tôi chấp nhận</b>
</div>
 </form>
<div class="space_10"></div>
</div>

</div>