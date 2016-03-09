<?php
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/sobaohiem/Baohiem.php";
    
    
    $myfunction = new My_function();
    $baohiem = new Baohiem();
    $error = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["masbh"])){
            $error[] = "Hãy nhập vào mã sổ bảo hiểm.";
        }else{
            $masbh = $myfunction->validate_input_form($_POST['masbh']);
        }
        
        if(empty($_POST["ngaycap"])){
            $error[] = "Hãy nhập vào ngày cấp.";
        }else{
            $ngaycap = $myfunction->validate_input_form($_POST['ngaycap']);
        }
        
        if(empty($_POST["noicap"])){
            $error[] = "Hãy nhập vào nơi cấp.";
        }else{
            $noicap = $myfunction->validate_input_form($_POST['noicap']);
        }
        
        if(empty($_POST["ghichu"])){
            $ghichu = "NULL";
        }else{
            $ghichu = $myfunction->validate_input_form($_POST['ghichu']);
        }
        
        $input = array(
            "masbh"=>$masbh,
            "ngaycap"=>$ngaycap,
            "noicap"=>$noicap,
            "ghichu"=>$ghichu
        );
        if(empty($error)){
            $add = $baohiem->add_baohiem($input);
            if($add){
                $message = "Thêm thành công.";
            }else{
                $warnning = "Lỗi. Không thêm được.";
            }
        }
        
    }
    include Configs::ABS_PATH . "views/admin/sobaohiem/add.view.php";