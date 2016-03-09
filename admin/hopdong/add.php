<?php
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/hopdong/Hopdong.php";
    
    
    $myfunction = new My_function();
    $hopdong = new Hopdong();
    $error = array();
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["mahd"])){
            $error[] = "Hãy nhập vào mã hợp đồng.";
        }else{
            $mahd = $myfunction->validate_input_form($_POST['mahd']);
        }
        
        if(empty($_POST["tenhd"])){
            $error[] = "Hãy nhập vào tên hợp đồng.";
        }else{
            $tenhd = $myfunction->validate_input_form($_POST['tenhd']);
        }
        
        if(empty($_POST["ngayki"])){
            $error[] = "Hãy nhập vào ngày kí.";
        }else{
            $ngayki = $myfunction->validate_input_form($_POST['ngayki']);
        }
        
        if(empty($_POST["ngayhethan"])){
            $ngayhethan = "NULL";
        }else{
            $ngayhethan = $myfunction->validate_input_form($_POST['ngayhethan']);
        }
        
        $input = array(
            "mahd"=>$mahd,
            "tenhopdong"=>$tenhd,
            "ngaykiket"=>$ngayki,
            "ngayhethan"=>$ngayhethan
        );
        if(empty($error)){
            $add = $hopdong->add_hopdong($input);
            if($add){
                $message = "Thêm thành công.";
            }else{
                $warnning = "Lỗi. Không thêm được.";
            }
        }
        
        
        
    }
    include Configs::ABS_PATH . "views/admin/hopdong/add.view.php";