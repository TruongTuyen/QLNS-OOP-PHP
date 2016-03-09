<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    
    $function = new My_function();
    
    include Configs::ABS_PATH . "models/staff/Staff.php";
    include Configs::ABS_PATH . "models/phongban/Phongban.php";
    include Configs::ABS_PATH . "models/chucvu/Chucvu.php";
    include Configs::ABS_PATH . "models/trinhdohocvan/Hocvan.php";
    include Configs::ABS_PATH . "models/hopdong/Hopdong.php";
    include Configs::ABS_PATH . "models/sobaohiem/Baohiem.php";
    include Configs::ABS_PATH . "libraries/upload.class.php";
    
    
    $staff = new Staff();
    $phongban = new Phongban();
    $chucvu = new Chucvu();
    $tdhv = new Hocvan();
    $hopdong = new Hopdong();
    $baohiem = new Baohiem();
    
    $dir = Configs::ABS_PATH . "uploads/";
    $upload = new Upload_image("avatar",$dir);
    
    $list_phongban = $phongban->get_list_phongban();
    $list_chucvu = $chucvu->get_list_chucvu();
    $list_tdhv = $tdhv->get_list_hocvan();
    $list_hopdong = $hopdong->get_list_hopdong();
    $list_baohiem = $baohiem->get_list_baohiem();
    
    $get_id = $_GET['id'];
    $action = $_GET['action'];
    
    //Code for update
    if(isset($get_id) && isset($action) && $action == "edit"){
        $staff_detail = $staff->get_staff_by_id($get_id);
        $error = array();
    
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["manhanvien"])){
                $error[] = "Hãy nhập vào mã nhân viên. ";
            }else{
                $manhanvien = $function->validate_input_form($_POST["manhanvien"]);
            }
            
            if(empty($_POST["hoten"])){
                $error[] = "Hãy nhập vào họ tên.";
            }else{
                $hoten = $function->validate_input_form($_POST["hoten"]);
            }
            
            if(empty($_POST["maphongban"])){
                $error[] = "Hãy chọn mã phòng ban. ";
            }else{
                $mapb = $function->validate_input_form($_POST["maphongban"]);
            }
            
            if(empty($_POST["ngaysinh"])){
                $error[] = "Hãy nhập vào ngày sinh ";
            }else{
                $ngaysinh = $function->validate_input_form($_POST["ngaysinh"]);
            }
            
            if(empty($_POST["machucvu"])){
                $error[] = "Hãy chọn mã chức vụ. ";
            }else{
                $machucvu = $function->validate_input_form($_POST["machucvu"]);
            }
            
            if(empty($_POST["gioitinh"])){
                $error[] = "Hãy chọn giới tính. ";
            }else{
                $gioitinh = $function->validate_input_form($_POST["gioitinh"]);
            }
            
            if(empty($_POST["tdhv"])){
                $error[] = "Hãy chọn trình độ học vấn ";
            }else{
                $tdhv = $function->validate_input_form($_POST["tdhv"]);
            }
            
            if(empty($_POST["diachi"])){
                $error[] = "Hãy nhập vào địa chỉ ";
            }else{
                $diachi = $function->validate_input_form($_POST["diachi"]);
            }
            
            if(empty($_POST["mahopdong"])){
                $error[] = "Hãy chọn mã hợp đồng. ";
            }else{
                $mahd = $function->validate_input_form($_POST["mahopdong"]);
            }
            
            if(empty($_POST["dantoc"])){
                $error[] = "Hãy nhập vào dân tộc. ";
            }else{
                $dantoc = $function->validate_input_form($_POST["dantoc"]);
            }
            
            if(empty($_POST["masbh"])){
                $error[] = "Hãy chọn mã sổ bảo hiểm. ";
            }else{
                $masbh = $function->validate_input_form($_POST["masbh"]);
            }
            
            if(empty($_POST["tongiao"])){
                $error[] = "Hãy nhập vào tôn giáo. ";
            }else{
                $tongiao = $function->validate_input_form($_POST["tongiao"]);
            }
            
            if(empty($_POST["ngoaingu"])){
                $error[] = "Hãy nhập vào ngoại ngữ. ";
            }else{
                $ngoaingu = $function->validate_input_form($_POST["ngoaingu"]);
            }
            
            if(empty($_POST["cmnd"])){
                $error[] = "Hãy nhập vào số chứng minh thư.";
            }else{
                $cmnd = $function->validate_input_form($_POST["cmnd"]);
            }
            
            if(empty($_POST["sdt"])){
                $error[] = "Hãy nhập vào số điện thoại. ";
            }else{
                $sdt = $function->validate_input_form($_POST["sdt"]);
            }
            
            
            if(empty($_POST["maktkl"])){
                $error[] = "Hãy nhập mã khen thưởng kỷ luật.";
            }else{
                $maktkl = $function->validate_input_form($_POST["maktkl"]);
            }
            
            if(empty($_POST["ghichu"]) || ($_POST["ghichu"]) == "NULL"){
                $ghichu = "NULL";
            }else{
                $ghichu = $function->validate_input_form($_POST["ghichu"]);
            }
            
            //$upload->upload();
            //if(empty($upload->file_name)){
            //    $error[] = "Hãy chọn ảnh.";
            //}else{
                //$anh = $upload->get_db_store_name();
            //}
            
            if(!empty($_POST["img_name"])){
                $lib_img = $_POST["img_name"];
                $arr_name = explode("/",$lib_img);
                $get_name = end($arr_name);
                unset($arr_name);
                $lib_img = $get_name;
            }
            
            if(!empty($_FILES["avatar"]["name"])){
                $up_img = $_FILES["avatar"]["name"];
                
                if(isset($up_img)){
                    $upload->upload();
                    $anh = $upload->get_db_store_name();
                }
            }
            
            if(isset($lib_img)){
                $anh = $lib_img;
            }
            
            
            $input = array(
                "manv"=>$manhanvien,
                "hoten"=>$hoten,
                "ngaysinh"=>$ngaysinh,
                "gioitinh"=>$gioitinh,
                "diachi"=>$diachi,
                "dantoc"=>$dantoc,
                "tongiao"=>$tongiao,
                "cmtnd"=>$cmnd,
                "maphongban"=>$mapb,
                "machucvu"=>$machucvu,
                "matdhv"=>$tdhv,
                "ngoaingu"=>$ngoaingu,
                "mahd"=>$mahd,
                "masbh"=>$masbh,
                "makt_kl"=>$maktkl,
                "sdt"=>$sdt,
                "ghichu"=>$ghichu
            );
            
            if(isset($anh)){
                $input["anh"] = $anh; 
            }
            
            
            if(empty($error)){
                $edit = $staff->update_staff_by_id($get_id,$input);
                if($edit){
                    $message = "Cập nhật dữ liệu thành công.";
                    $flag = true;
                }else{
                    $warnning = "Lỗi. Không cập nhật được.";
            //        $dirname = Configs::ABS_PATH . "uploads/" . $upload->get_db_store_name();
             //       if(file_exists($dirname)){
            //            unlink($dirname);
            //        }
                }
            }
        }
        
        //Test code
        //*
        //*
        //----------
        
        
        include Configs::ABS_PATH . "views/admin/staff/change.view.php"; 
        if(isset($message) && $flag==true){ ?>
            <script type="text/javascript">
                var event = alert("Cập nhật dữ liệu thành công.");
                    if(!event){
                        location.href = '<?php echo Configs::ABS_URL; ?>admin/staff/detail.php?id=<?php echo $get_id; ?>&action=details';
                    }
                
           </script>
<?php   }
        
        
    }//End code update
    
    //Code for delete
    if(isset($get_id) && $action && $action=="delete" ){
        if($staff->delete_staff_by_id($get_id)){ ?>
            <script type="text/javascript">
                        var event = alert("Xóa thành công.");
                            if(!event){
                                location.href = '<?php echo Configs::ABS_URL; ?>admin/staff/list.php';
                            }
                        
                   </script>
<?php   }else{  ?>
            <script type="text/javascript">
                        var event = alert("Lỗi! Không xóa được.");
                            if(!event){
                                location.href = '<?php echo Configs::ABS_URL; ?>admin/staff/list.php';
                            }
                        
                   </script>
<?php   }
    }//End code delete
    
    
?>