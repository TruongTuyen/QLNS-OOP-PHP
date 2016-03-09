<?php include Configs::ABS_PATH. "views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH. "views/admin/user/sidebar.view.php"; ?>	
	<section id="main" class="column">
		
		<h4 class="alert_info">Thay đổi thông tin.</h4>
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
            <form action="" method="post">
			<header><h3>Sửa thông tin</h3></header>
				<div class="module_content">
                        <fieldset style="width:48%; float:left;"> 
							<label>Email:</label>
							<input type="text" name="email" style="width:92%;" value="<?php echo $userList->get_email(); ?>"/>
						</fieldset>
                        
                        <fieldset style="width:48%; float:left;margin-left:20px;"> 
							<label>Số điện thoại</label>
							<input type="text" name="phone" style="width:92%;" value="<?php if($userList->get_phone() != "") echo $userList->get_phone(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left;"> 
							<label>Họ tên</label>
							<input type="text" name="fullname" style="width:92%;" value="<?php echo $userList->get_fullname(); ?>"/>
						</fieldset>
                        
                        <fieldset style="width:48%; float:left;margin-left: 20px;"> 
							<label>Quyền</label>
							<select style="width:92%;" name="role">
                                <?php 
                                    $role = $userList->get_role(); 
                                    if($role == 2){
                                        echo 
                                                "<option value='1'>Người quản trị</option>
                                                <option value='2' selected='selected'>Người dùng thường</option>";
                                    }else{
                                        echo 
                                                "<option value='1' selected='selected'>Người quản trị</option>
                                                <option value='2'>Người dùng thường</option>";
                                    }
                                    
                                
                                ?>
								
							</select>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left;"> 
							<label>Địa chỉ</label>
							<input type="text" name="address" style="width:92%;" value="<?php echo $userList->get_address(); ?>"/>
						</fieldset>
                        
                        <fieldset style="width:48%; float:left;margin-left: 20px;"> 
							<label>Giới Tính</label>
							<select name="sex" style="width: 92%;" >
                                <?php 
                                    $sex = $userList->get_sex(); 
                                    if($sex == "Nam" || $sex = "nam" || $sex="NAM"){
                                        echo "<option value='Nam' selected='selected'>Nam</option>
                                              <option value='Nữ'>Nữ</option>";
                                    }else{
                                        echo "<option value='Nam' >Nam</option>
                                              <option value='Nữ' selected='selected'>Nữ</option>";
                                    }
                                ?>
                                
                            </select>
						</fieldset><div class="clear"></div>
                        
                       <div class="clear"></div>
						
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Sửa " class="alt_btn"/>
				</div>
			</footer>
          </form>  
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>


</body>

</html>