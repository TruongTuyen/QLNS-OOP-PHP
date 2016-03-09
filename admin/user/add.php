<?php
    session_start();
    require '../../configs/configs.php';
    require Configs::ABS_PATH ."libraries/function.class.php";
    $myfunction = new My_function();
    $myfunction->check_login();
    $myfunction->check_admin();
    
    require Configs::ABS_PATH .'models/user/User.php';
    
    //khoi tao doi tuong
    $userModel = new User();
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $myfunction->validate_input_form($_POST['email']);
        $password = $myfunction->validate_input_form($_POST["password"]);
        $fullname = $myfunction->validate_input_form($_POST['fullname']);
        $role = $_POST["role"];
        $address = $myfunction->validate_input_form($_POST["address"]);
        $sex = $myfunction->validate_input_form($_POST['sex']);
        $phone = $myfunction->validate_input_form($_POST['phone']);
        
        $error = array();
        if(empty($email)){
            $error[] = "Hãy nhập vào email.";
        }
        
        if(empty($password)){
            $error[] = "Hãy nhập vào mật khẩu.";
        }
        
        if(empty($fullname)){
            $error[] = "Hãy nhập đầy đủ họ tên.";
        }
        
        if(empty($role)){
            $error[] = "Hãy chọn quyền.";
        }
        
        if(empty($address)){
            $error[] = "Hãy nhập vào địa chỉ";
        }
        
        if(empty($sex)){
            $error[] = "Hãy chọn giới tính";
        }
        
        if(empty($error)){
            $data = array(
                "email"=>$email,
                "matkhau"=>sha1($password),
                "hoten"=>$fullname,
                "quyen"=>$role,
                "diachi"=>$address,
                "gioitinh"=>$sex,
                "sodienthoai"=>isset($phone) ? $phone : "NULL",
                "ngaytao"=>"NOW()"
            );
            $add_user = $userModel->add_user($data);
            if($add_user == true){
                $message = "Thêm thành công một người dùng.";
            }else{
                $message = "Lỗi. Không thêm được người dùng ";
            }
        }
        
        
    }

    //Lay danh sach thanh vien
    //$userList = $userModel->add_user();


    //Chen file view
    require Configs::ABS_PATH . 'views/admin/user/add.view.php';