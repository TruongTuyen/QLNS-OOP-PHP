<?php include Configs::ABS_PATH . "/views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH . "/views/admin/user/sidebar.view.php"; ?>
<section id="main" class="column">
		
		
        <?php if(isset($message)){
            echo "<h4 class='alert_success'>{$message}</h4>";
        } ?>
        <?php if(isset($warnning)){
            echo "<h4 class='alert_error'>{$warnning}</h4>";
        } ?>
        <?php
            if(isset($error) && !empty($error)){
                foreach($error as $er){
                    echo "<h4 class='alert_error'>{$er}</h4>";
                }
            }
        
         ?>
		 
		<div class="clear"></div>
		
		<article class="module width_full">
            <form action="" method="post" >
			<header><h3>Cập Nhật Hơp Đồng</h3></header>
				<div class="module_content">
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Hợp Đồng<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;"name="mahd" value="<?php echo $detail->get_mahd(); ?>"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Tên Hợp Đồng<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="tenhd" value="<?php echo $detail->get_tenhd(); ?>"/>
						</fieldset><div class="clear"></div>
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Ngày Kí Kết<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;"name="ngayki" value="<?php echo $detail->get_ngayky(); ?>"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Ngày Hết Hạn</samp></label>
							<input type="text" style="width:92%;" name="ngayhethan" value="<?php echo $detail->get_ngayhethan(); ?>"/>
						</fieldset><div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Cập Nhật" class="alt_btn"/>
				</div>
			</footer>
          </form>  
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>


</body>

</html>