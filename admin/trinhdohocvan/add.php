<?php
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/trinhdohocvan/Hocvan.php";
    
    
    $myfunction = new My_function();
    $hocvan = new Hocvan();
    $error = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["matdhv"])){
            $error[] = "Hãy nhập vào mã trình độ học vấn.";
        }else{
            $matdhv = $myfunction->validate_input_form($_POST['matdhv']);
        }
        
        if(empty($_POST["trinhdohocvan"])){
            $error[] = "Hãy nhập vào tên trình độ học vấn.";
        }else{
            $tentdhv = $myfunction->validate_input_form($_POST['trinhdohocvan']);
            
        }
        
        if(empty($_POST["chuyennganh"])){
            $chuyennganh = "NULL";
        }else{
            $chuyennganh = $myfunction->validate_input_form($_POST['chuyennganh']);
            
        }
        
        $input = array(
            "matdhv"=>$matdhv,
            "trinhdohocvan"=>$tentdhv,
            "chuyennganh"=>$chuyennganh
        );
        
        if(empty($error)){
            $add = $hocvan->add_hocvan($input);
            if($add){
                $message = "Thêm thành công.";
            }else{
                $warnning = "Lỗi. Không thêm được.";
            }  
        }
        
    }
    include Configs::ABS_PATH . "views/admin/trinhdohocvan/add.view.php";