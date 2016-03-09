<?php include Configs::ABS_PATH . "/views/template/header.view.php"; ?>
<?php include Configs::ABS_PATH . "/views/admin/user/sidebar.view.php"; ?>
<section id="main" class="column">
		
		<div class="clear"></div>
		
		<article class="module width_full">
            <form action="" method="post" enctype="multipart/form-data">
			<header><h3>Chi tiết nhân viên</h3></header>
				<div class="module_content">
                        <div style="float: left;width:48%;height:160px;height: 180px;">
                            <fieldset style="width:100%; float:left; margin-right: 3%;"> 
                            	<label>Mã Nhân Viên </label>
    							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_id(); ?>"/>
    						</fieldset>
                            
                            <div class="clear"></div>
    						<fieldset style="width:100%; float:left;">
    							<label>Họ Tên </label>
    							<input type="text" style="width:92%;" name="hoten" readonly="" value="<?php echo $staff_detail->get_staff_fullname(); ?>"/>
    						</fieldset><div class="clear"></div>
                            
                        </div>
                        <div style="width:100px;height:100px;float:right;width:49%;margin-top:10px;" >
                           <img src="<?php echo Configs::ABS_URL; ?>uploads/<?php echo $staff_detail->get_staff_avatar();?>" width="160px" height="160px" />
                        </div><!--Contain img tag-->
                        <div class="clear"></div>
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Phòng Ban </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_department(); ?>"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Ngày Sinh</label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_birthday(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Chức Vụ </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_office(); ?>"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Giới Tính </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_sex(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Trình Độ Học Vấn </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_literacy_id(); ?>"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Địa Chỉ </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_address(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Hợp Đồng </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_constract_id(); ?>"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Dân Tộc </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_folk(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                        	<label>Mã Sổ Bảo Hiểm </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_insurance_id(); ?>"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Tôn Giáo </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_religion(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left;margin-right: 3%;">
							<label>Ngoại Ngữ </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_foreign_language(); ?>"/>
						</fieldset>
                        
						<fieldset style="width:48%; float:left;">
							<label>Số Chứng Minh Thư </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_person_id(); ?>"/>
						</fieldset><div class="clear"></div>
                        
                        
						<fieldset style="width:48%; float:left;">
							<label>Số Điện Thoại </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_phone(); ?>"/>
						</fieldset>
                        
                        <fieldset style="width:48%; float:left;margin-left:30px;"> 
                        	<label>Mã Khen Thưởng, Kỷ Luật </label>
							<input type="text" readonly="" style="width:92%;" name="manhanvien" value="<?php echo $staff_detail->get_staff_felicitation_discipline_id(); ?>"/>
						</fieldset><div class="clear"></div>
                        
						<fieldset>
							<label>Ghi Chú</label>
                            <?php 
                                    $db_note = $staff_detail->get_note();
                                    if(empty($db_note)){
                                        $note = "NULL";
                                    }else{
                                        $note = $db_note;
                                    }
                                ?>
							<textarea rows="8" name="ghichu"><?php echo $note; ?></textarea>
						</fieldset>
						
				</div>
			
          </form>  
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>


</body>

</html>