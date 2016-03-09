<?php
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/ktkl/Ktkl.php";
    include Configs::ABS_PATH . "models/staff/Staff.php";
    
    $myfunction = new My_function();
    $ktkl = new Ktkl();
    $staff = new Staff();
    $list_staff = $staff->get_list_staff();
    
    $error = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["maktkl"])){
            $error[] = "Hãy nhập vào mã khen thưởng, kỷ luật.";
        }else{
            $maktkl = $myfunction->validate_input_form($_POST['maktkl']);
        }
        
        if(empty($_POST["loai"])){
            $error[] = "Hãy chọn loại.";
        }else{
            $loai = $myfunction->validate_input_form($_POST['loai']);
        }
        
        if(empty($_POST["lydo"])){
            $error[] = "Hãy nhập vào lý do.";
        }else{
            $lydo = $myfunction->validate_input_form($_POST['lydo']);
        }
        
        $input = array(
            "maktkl"=>$maktkl,
            "loai"=>$loai, //Loai 1:khen thuong, loai 2: Ky luat;
            "lydo"=>$lydo,
            "ngaylap"=>"NOW()"
        );
        
        if(empty($error)){
           $add = $ktkl->add_ktkl($input);
            if($add){
                $message = "Thêm thành công.";
            }else{
                $warnning = "Lỗi! Không thêm được.";
            } 
        }
        
        
    }
    include Configs::ABS_PATH . "views/admin/ktkl/add.view.php";