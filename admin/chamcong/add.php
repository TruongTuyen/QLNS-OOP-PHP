<?php
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/chamcong/Chamcong.php";
    include Configs::ABS_PATH . "models/staff/Staff.php";
    
    $myfunction = new My_function();
    $chamcong = new Chamcong();
    $staff = new Staff();
    
    $list_staff = $staff->get_list_staff();
    $error = array();
    
    
    include Configs::ABS_PATH . "views/admin/chamcong/add.view.php";