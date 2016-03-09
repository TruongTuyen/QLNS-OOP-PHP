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
			<header><h3>Thêm nhân viên</h3></header>
				<div class="module_content">
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Nhân Viên<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="manhanvien"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Họ Tên<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="hoten"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Phòng Ban<samp class="red"> *</samp></label>
							<select style="width:92%;" name="maphongban">
                                <option></option>
                                <?php  
                                    foreach($list_phongban as $pb_detail){ ?>
                                      <option value="<?php echo $pb_detail->get_maphongban(); ?>"><?php echo $pb_detail->get_tenphongban(); ?></option>
                           <?      }
                                ?>
								
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Ngày Sinh<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="ngaysinh" placeholder="VD: 2015-03-29"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Chức Vụ<samp class="red"> *</samp></label>
							<select style="width:92%;" name="machucvu">
                                <option></option>
                                <?php foreach($list_chucvu as $detail){ ?>
                                     <option value="<?php echo $detail->get_machucvu(); ?>"><?php echo $detail->get_tenchucvu(); ?></option>
                                <?php  } ?>
								
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Giới Tính<samp class="red"> *</samp></label>
							<select style="width:92%;" name="gioitinh">
								<option value="Nam">Nam</option>
								<option value="Nữ">Nữ</option>
							</select>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Trình Độ Học Vấn<samp class="red"> *</samp></label>
							<select style="width:92%;" name="tdhv">
                                <option></option>
                                <?php foreach($list_tdhv as $detail){ ?>
                                        <option value="<?php echo $detail->get_matdhv(); ?>"><?php echo $detail->get_tdhv(); ?></option>
                                <?php }  ?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Địa Chỉ<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="diachi"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Hợp Đồng<samp class="red"> *</samp></label>
							<select style="width:92%;" name="mahopdong">
                                <option></option>
                                <?php foreach($list_hopdong as $detail){ ?>
                                    <option value="<?php echo $detail->get_mahd(); ?>"><?php echo $detail->get_mahd(); ?></option>
                                <?php }  ?>
								
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Dân Tộc<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="dantoc"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Sổ Bảo Hiểm<samp class="red"> *</samp></label>
							<select style="width:92%;" name="masbh">
                                <option></option>
                                <?php foreach($list_baohiem as $detail){ ?>
								    <option value="<?php echo $detail->get_masbh(); ?>"><?php echo $detail->get_masbh(); ?></option>
                                <?php } ?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Tôn Giáo<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="tongiao"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left;margin-right: 3%;">
							<label>Ngoại Ngữ<samp class="red"> *</samp></label>
							<select style="width:92%;" name="ngoaingu">
								<option value="Không" selected="selected">Không</option>
								<option value="Tiếng Anh">Tiếng Anh</option>
                                <option value="Tiếng Trung">Tiếng Trung</option>
								<option value="Tiếng Nga">Tiếng Nga</option>
                                <option value="Tiếng Pháp">Tiếng Pháp</option>
								<option value="Tiếng Nhật">Tiếng Nhật</option>
                                <option value="Tiếng Hàn">Tiếng Hàn</option>
							</select>
						</fieldset>
                        
						<fieldset style="width:48%; float:left;">
							<label>Số Chứng Minh Thư<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="cmnd"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Ảnh<samp class="red"> *</samp></label>
							<input type="file" name="image" value="Upload..." style="width:92%;"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Số Điện Thoại<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="sdt"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Khen Thưởng, Kỷ Luật<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="maktkl"/>
						</fieldset><div class="clear"></div>
                        
						<fieldset>
							<label>Ghi Chú</label>
							<textarea rows="8" name="ghichu"></textarea>
						</fieldset>
						
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