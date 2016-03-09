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
            <form action="" method="post" enctype="multipart/form-data">
			<header><h3>Trình Độ Học Vấn</h3></header>
				<div class="module_content">
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Trình Độ Học Vấn<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;"name="matdhv"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Tên Trình Độ Học Vấn<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="trinhdohocvan"/>
						</fieldset><div class="clear"></div>
                        <fieldset style="width:48%; float:left;">
							<label>Chuyên Ngành</label>
							<input type="text" style="width:92%;" name="chuyennganh"/>
						</fieldset><div class="clear"></div>
                        
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Thêm" class="alt_btn"/>
					<input type="reset" value="Xóa"/>
				</div>
			</footer>
          </form>  
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>


</body>

</html>