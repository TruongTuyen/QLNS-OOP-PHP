<?php
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/phongban/Phongban.php";
    
    
    $myfunction = new My_function();
    $chucvu = new Phongban();
    $error = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["maphongban"])){
            $error[] = "Hãy nhập vào mã phòng ban.";
        }else{
            $maphongban = $myfunction->validate_input_form($_POST['maphongban']);
        }
        
        if(empty($_POST["tenphongban"])){
            $error[] = "Hãy nhập vào tên phòng ban.";
        }else{
            $tenphongban = $myfunction->validate_input_form($_POST['tenphongban']);
            
        }
        
        if(empty($_POST["sodienthoai"])){
            $error[] = "Hãy nhập vào số điện thoại.";
        }else{
            $sodienthoai = $myfunction->validate_input_form($_POST['sodienthoai']);
            
        }
        
        $input = array(
            "maphongban"=>$maphongban,
            "tenphongban"=>$tenphongban,
            "sdt"=>$sodienthoai
        );
    
        if(empty($error)){
            $add = $chucvu->add_phongban($input);
            if($add){
                $message = "Thêm thành công.";
            }else{
                $warnning = "Lỗi. Không thêm được.";
            } 
        }
        
    }
    include Configs::ABS_PATH . "views/admin/phongban/add.view.php";