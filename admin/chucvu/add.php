<?php
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/chucvu/Chucvu.php";
    
    
    $myfunction = new My_function();
    $chucvu = new Chucvu();
    $error = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["machucvu"])){
            $error[] = "Hãy nhập vào mã chức vụ.";
        }else{
            $machucvu = $myfunction->validate_input_form($_POST['machucvu']);
        }
        
        if(empty($_POST["tenchucvu"])){
            $error[] = "Hãy nhập vào tên chức vụ.";
        }else{
            $tenchucvu = $myfunction->validate_input_form($_POST['tenchucvu']);
            $tenchucvu = $_POST['tenchucvu'];
        }
        
        $input = array(
            "machucvu"=>$machucvu,
            "tenchucvu"=>$tenchucvu
        );
        
        if(empty($error)){
            $add = $chucvu->add_chucvu($input);
            if($add){
                $message = "Thêm thành công.";
            }else{
                $warnning = "Lỗi. Không thêm được.";
            } 
        }
        
    }
    include Configs::ABS_PATH . "views/admin/chucvu/add.view.php";