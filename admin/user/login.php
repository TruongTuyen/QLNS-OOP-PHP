<?php 
    session_start();
    if(isset($_SESSION['ss_user'])){
        if(isset($_SESSION['ss_role']) && $_SESSION['ss_role'] == 1){
            header('Location:../admin-home.php'); //Chuyen toi trang cua admin
        }else if(isset($_SESSION['ss_role']) && $_SESSION['ss_role'] == 2){
            header('Location:user-home.php'); //Chuyen toi trang cua nguoi dung thuong
        }
    }else{
    
        require_once "../../configs/configs.php";
        require_once Configs::ABS_PATH . "models/user/User.php";
        include_once Configs::ABS_PATH . "libraries/function.class.php";
        
        $myfunction = new My_function();
        //Tao bien luu loi
        $error = array();
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(!empty($_POST['email'])){
                $email = $myfunction->validate_input_form($_POST['email']);
            }else{
                $error[] = 'The email field was empty'; 
            }
            
            if(!empty($_POST['password'])){
                $password = $myfunction->validate_input_form($_POST['password']);
            }else{
                $error[] = 'The password field was empty';
            }
            
            if(isset($email) && isset($password)){
                $user = new User();
                //$userLogin = $user->login($email,$password);
                $userLogin = $user->get_by_email($email);
                $pass = $userLogin->get_password();
                
                if($userLogin && $pass == sha1($password)){
                    $_SESSION['ss_user'] = $userLogin->get_email();
                    $_SESSION['ss_role'] = $userLogin->get_role();
                    header('Location:../home.php');
                }else{
                    $message = "Wrong email or password";
                }
            }else{
                $message = 'Please fill in all the required field';
            }
        }
    
        include_once Configs::ABS_PATH . "views/admin/user/login.view.php"; 
    }
?>
