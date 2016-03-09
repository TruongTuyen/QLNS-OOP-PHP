<?php include Configs::ABS_PATH . "/views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH . "/views/admin/user/sidebar.view.php"; ?>

                            <div id="popup_content" class="popup">
                            	<div class="popup-header">
                            		<h2>Images Library</h2>
                            		<a class="close_popup" href="javascript:void(0)"></a>
                            	</div>
                            	<div class="info_popup">
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                       $(".info_popup img").click(function(){
                                            $("img").removeClass("clicked");
                                            $(this).addClass("clicked");
                                            var img_name = $(this).attr("src");
                                            $("input[type=hidden]").attr("value",img_name);
                                            //$(".close_popup").click(function(){
                                                $("img#avatar_image").attr("src",img_name);
                                            //});
                                            
                                            
                                       }); 
                                      
                                        
                                    });
                                </script>
                                <script type="text/javascript">
                                        function file_change(f){
                                        	var reader = new FileReader();
                                        	reader.onload = function (e) {
                                        		var img = document.getElementById("avatar_image");
                                        		img.src = e.target.result;
                                                var input_img = document.getElementById("upload_name_imge");
                                                input_img.value = "";
                                        	};
                                        	reader.readAsDataURL(f.files[0]);
                                        }
                                </script>
                                <?php
                            		$dir = Configs::ABS_PATH;
                                    $dir2 = Configs::ABS_URL;
                                    $op=opendir($dir."uploads");
                                    while($file=readdir($op))
                                    {
                                    	 if($file!='.' && $file!='..')
                                    	 {
                                    	   echo "<img src='".$dir2."uploads/$file' width='150px' height='150px'/> &nbsp;&nbsp;"; 
                                    	 }
                                    } 
                                ?>    
                            	</div>
                            
                            </div>

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
			<header><h3>Chi tiết nhân viên</h3></header>
				<div class="module_content">
                        <div style="float: left;width:48%;height:160px;height: 180px;">
                            <fieldset style="width:100%; float:left; margin-right: 3%;"> 
                            	<label>Mã Nhân Viên </label>
    							<input type="text"  style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_id(); ?>"/>
    						</fieldset>
                            
                            <div class="clear"></div>
    						<fieldset style="width:100%; float:left;">
    							<label>Họ Tên </label>
    							<input type="text" style="width:92%;" name="hoten"  value="<?php echo $staff_detail->get_staff_fullname(); ?>"/>
    						</fieldset><div class="clear"></div>
                            
                        </div>
                        <div style="width:100px;height:100px;float:right;width:49%;margin-top:10px;" >
                           <img id="avatar_image" src="<?php echo Configs::ABS_URL; ?>uploads/<?php echo $staff_detail->get_staff_avatar();?>" width="160px" height="160px" />
                           <div style="width:295px;float: right;">
                               <div style="position: relative;">
                                    <input type="file" name="avatar" id="file" onchange="file_change(this)" />
                                    <input type="hidden" onclick="document.getElementById('f').click()"  value="Upload" />
                               </div> 
                                
                               <div align="center" class="center">
                            	   <input type="button" id="open_popup" name="open_popup" rel="miendatwebPopup" href="#popup_content" value="Chọn từ thư viện"/>
                                   <input type="hidden" name="img_name" id="upload_name_imge" value="" />
                               </div>
                           </div>
                        </div><!--Contain img tag-->
                            
                        <!-------------------------->
                        <div class="clear"></div>
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Phòng Ban<samp class="red"> *</samp></label>
							<select style="width:92%;" name="maphongban">
                                <option value=""></option>
                                <?php  
                                    $mapb = $staff_detail->get_staff_department();
                                    foreach($list_phongban as $pb_detail){ $ma = $pb_detail->get_maphongban(); ?>
                                      
                                      <option value="<?php echo $ma; ?>" <?php if($mapb == $ma) echo "selected='selected'"; ?>><?php echo $ma; ?></option>
                           <?      }
                                ?>
								
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Ngày Sinh<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="ngaysinh" value="<?php echo $staff_detail->get_staff_birthday(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Chức Vụ<samp class="red"> *</samp></label>
							<select style="width:92%;" name="machucvu">
                                <option></option>
                                <?php 
                                    $ma_cv = $staff_detail->get_staff_office();
                                    foreach($list_chucvu as $detail){
                                        $ma = $detail->get_machucvu();
                                ?>
                                     <option value="<?php echo $ma; ?>" <?php if($ma_cv == $ma) echo "selected='selected'"; ?> ><?php echo $detail->get_tenchucvu(); ?></option>
                                <?php  } ?>
								
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Giới Tính<samp class="red"> *</samp></label>
							<select style="width:92%;" name="gioitinh">
                                <?php $sex = $staff_detail->get_staff_sex(); ?>
								<option value="Nam" <?php if($sex == "Nam") echo "selected='selected'" ?> >Nam</option>
								<option value="Nữ" <?php if($sex == "Nữ") echo "selected='selected'" ?> >Nữ</option>
							</select>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Trình Độ Học Vấn<samp class="red"> *</samp></label>
							<select style="width:92%;" name="tdhv">
                                <option></option>
                                <?php 
                                    $tdhv = $staff_detail->get_staff_literacy_id();
                                    foreach($list_tdhv as $detail){ 
                                        $ma = $detail->get_matdhv();
                                ?>
                                        <option value="<?php echo $ma; ?>" <?php if($tdhv==$ma) echo "selected='selected'" ?> ><?php echo $detail->get_tdhv(); ?></option>
                                <?php }  ?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Địa Chỉ<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="diachi" value="<?php echo $staff_detail->get_staff_address(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Hợp Đồng<samp class="red"> *</samp></label>
							<select style="width:92%;" name="mahopdong">
                                <option></option>
                                <?php 
                                $mahd = $staff_detail->get_staff_constract_id();
                                foreach($list_hopdong as $detail){ 
                                  $ma =   $detail->get_mahd();
                                ?>
                                    <option value="<?php echo $ma; ?>" <?php if($ma==$mahd) echo "selected='selected'" ?> ><?php echo $ma; ?></option>
                                <?php }  ?>
								
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Dân Tộc<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="dantoc" value="<?php echo $staff_detail->get_staff_folk(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Sổ Bảo Hiểm<samp class="red"> *</samp></label>
							<select style="width:92%;" name="masbh">
                                <option></option>
                                <?php 
                                $masbh = $staff_detail->get_staff_insurance_id();
                                foreach($list_baohiem as $detail){ 
                                    $ma = $detail->get_masbh();
                                ?>
								    <option value="<?php echo $ma ?>" <?php if($ma==$masbh) echo "selected='selected'"; ?>  ><?php echo $ma; ?></option>
                                <?php } ?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Tôn Giáo<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="tongiao" value="<?php echo $staff_detail->get_staff_religion(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left;margin-right: 3%;">
							<label>Ngoại Ngữ<samp class="red"> *</samp></label>
							<select style="width:92%;" name="ngoaingu">
                            <?php $ngoaingu = $staff_detail->get_staff_foreign_language(); ?>
								<option value="Không" <?php if($ngoaingu == "Không") echo "selected='selected'"; ?>>Không</option>
								<option value="Tiếng Anh" <?php if($ngoaingu == "Tiếng Anh") echo "selected='selected'"; ?>>Tiếng Anh</option>
                                <option value="Tiếng Trung" <?php if($ngoaingu == "Tiếng Trung") echo "selected='selected'"; ?>>Tiếng Trung</option>
								<option value="Tiếng Nga" <?php if($ngoaingu == "Tiếng Nga") echo "selected='selected'"; ?>>Tiếng Nga</option>
                                <option value="Tiếng Pháp" <?php if($ngoaingu == "Tiếng Pháp") echo "selected='selected'"; ?>>Tiếng Pháp</option>
								<option value="Tiếng Nhật" <?php if($ngoaingu == "Tiếng Nhật") echo "selected='selected'"; ?>>Tiếng Nhật</option>
                                <option value="Tiếng Hàn" <?php if($ngoaingu == "Tiếng Hàn") echo "selected='selected'"; ?>>Tiếng Hàn</option>
							</select>
						</fieldset>
                        
						<fieldset style="width:48%; float:left;">
							<label>Số Chứng Minh Thư<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="cmnd" value="<?php echo $staff_detail->get_staff_person_id(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Khen Thưởng, Kỷ Luật<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="maktkl" value="<?php echo $staff_detail->get_staff_felicitation_discipline_id(); ?>" />
						</fieldset>
                        
						<fieldset style="width:48%; float:left;">
							<label>Số Điện Thoại<samp class="red"> *</samp></label>
							<input type="text" style="width:92%;" name="sdt" value="<?php echo $staff_detail->get_staff_phone(); ?>" />
						</fieldset><div class="clear"></div>
                        
                        
                        
						<fieldset>
							<label>Ghi Chú</label>
                            <?php  
                                $note = $staff_detail->get_note();
                                if(!empty($note)){
                                    $out = $note;
                                }else{
                                    $out = "NULL";
                                }
                            
                            ?>
							<textarea rows="8" name="ghichu"><?php echo $out;?></textarea>
						</fieldset>
						
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