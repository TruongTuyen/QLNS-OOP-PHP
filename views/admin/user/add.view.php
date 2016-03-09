<?php include Configs::ABS_PATH. "views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH. "views/admin/user/sidebar.view.php"; ?>	
	<section id="main" class="column">
		
		<h4 class="alert_info">Thêm người dùng vào hệ thống.</h4>
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
			<header><h3>Thêm người dùng</h3></header>
				<div class="module_content">
                        <fieldset style="width:48%; float:left;"> 
							<label>Email:</label>
							<input type="text" name="email" style="width:92%;"/>
						</fieldset>
                        
                        <fieldset style="width:48%; float:left; margin-left: 20px;"> 
							<label>Mật Khẩu</label>
							<input type="password" name="password" style="width:92%;"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left;"> 
							<label>Họ tên</label>
							<input type="text" name="fullname" style="width:92%;"/>
						</fieldset>
                        
                        <fieldset style="width:48%; float:left;margin-left: 20px;"> 
							<label>Quyền</label>
							<select style="width:92%;" name="role">
								<option value="2">Người dùng thường</option>
							</select>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left;"> 
							<label>Địa chỉ</label>
							<input type="text" name="address" style="width:92%;"/>
						</fieldset>
                        
                        <fieldset style="width:48%; float:left;margin-left: 20px;"> 
							<label>Giới Tính</label>
							<select name="sex" style="width: 92%;" >
                                <option value="Nam" selected="selected">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left;"> 
							<label>Số điện thoại</label>
							<input type="text" name="phone" style="width:92%;"/>
						</fieldset><div class="clear"></div>
						
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Thêm " class="alt_btn"/>
					<input type="reset" value="Xóa" class="alt_btn"/>
				</div>
			</footer>
          </form>  
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>


</body>

</html>