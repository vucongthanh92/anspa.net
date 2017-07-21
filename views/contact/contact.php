<div class="top_page">
    <div class="grid">
         <p id="breadcrumbs"> <?php echo $data['map_title'] ?></p>   
         <h2 class="title"><span>Liên Hệ</span></h2>    
    </div>
</div>
<div class="grid">
<div class="content">
    
    <div class="contact-us">
        <div class="contact-address">
        <?php echo stripcslashes($data['ttlienhe']['content_vn']); ?> 
        </div>
        <div class="contact-form">
        <form action="" method="post">
            <div class="twins">
                <input type="text" placeholder="Name" name="hoten"  required="required"/>
                <input type="email" placeholder="Email" name="email" required />
            </div>
            <input type="text" placeholder="Title" name="title" required />
            <textarea placeholder="Message" name="note" class="message" required></textarea>
            <input type="submit" value="send message" name="btngui" class="send-btn" />
        </form>
        </div>
    </div>
</div>

<!--phần sản phẩm quan tâm và hướng dẫn mua hàng-->
     <div class="space_10"></div>
     <?php loadview('pagefixed/partners',$partners)?>

<div class="space_10"></div>
</div>
