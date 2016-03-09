<?php
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/luongthoathuan/Luong.php";
    include Configs::ABS_PATH . "models/staff/Staff.php";
    
    $myfunction = new My_function();
    $luong = new Luong();
    $staff = new Staff();
    $list_staff = $staff->get_list_staff();
    
    $error = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["manv"])){
            $error[] = "Hãy chọn mã nhân viên.";
        }else{
            $manv = $myfunction->validate_input_form($_POST['manv']);
        }
        
        if(empty($_POST["luongcoban"])){
            $error[] = "Hãy nhập vào lương cơ bản.";
        }else{
            $luongcoban = $myfunction->validate_input_form($_POST['luongcoban']);
        }
        
        if(empty($_POST["hesoluong"])){
            $error[] = "Hãy nhập vào hệ số lương.";
        }else{
            $hesoluong = $myfunction->validate_input_form($_POST['hesoluong']);
        }
        
        $input = array(
            "manv"=>$manv,
            "luongcoban"=>$luongcoban, 
            "hesoluong"=>$hesoluong,
        );
        
        if(empty($error)){
           $add = $luong->add_luong($input);
            if($add){
                $message = "Thêm thành công.";
            }else{
                $warnning = "Lỗi! Không thêm được.";
            } 
        }
        
        
    }
    include Configs::ABS_PATH . "views/admin/luongthoathuan/add.view.php";