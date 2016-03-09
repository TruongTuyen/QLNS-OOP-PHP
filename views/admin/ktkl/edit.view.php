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
			<header><h3>Cập Nhật Khen Thưởng Kỷ Luật</h3></header>
				<div class="module_content">
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Khen Thưởng, Kỷ Luật<samp class="red"> *</samp></label>
							<select style="width:92%;" name="maktkl">
                            <?php 
                                $db_maktkl = $ktkl_detail->get_maktkl();
                                
                                foreach($list_staff as $detail){ 
                                    $name = $detail->get_staff_fullname();
                                    $ma_ktkl = $detail->get_staff_felicitation_discipline_id();
                            ?>
								<option value="<?php echo $ma_ktkl; ?>" <?php if($ma_ktkl == $db_maktkl) echo "selected='selected'"; ?>><?php echo $ma_ktkl . " - ".$name; ?></option>  
                            <?php }  ?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Loại<samp class="red"> *</samp></label>
							<select style="width:92%;" name="loai">
                                <?php $db_loai = $ktkl_detail->get_loai(); ?>
								<option value="1" <?php if($db_loai==1) echo "selected='selected'"; ?>>Khen Thưởng</option>
								<option value="2" <?php if($db_loai==2) echo "selected='selected'"; ?>>Kỷ Luật</option>
							</select>
						</fieldset><div class="clear"></div>
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        
                        	<label>Lý Do<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;"name="lydo" value="<?php echo $ktkl_detail->get_lydo(); ?>"/>
						</fieldset>
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Ngày Lập</label>
							<input type="text" style="width:92%;"name="ngaylap" value="<?php echo $ktkl_detail->get_ngaylap(); ?>"/>
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