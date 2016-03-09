<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "models/staff/Staff.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    $staff = new Staff();
    
    
    $staff_id = $_GET['id'];
    $action = $_GET['action'];
    
    if(isset($staff_id) && !empty($staff_id)){
        if(isset($action) && !empty($action) && $action == "details"){
            $staff_detail = $staff->get_staff_by_id($staff_id);
        }
    }
    
    include Configs::ABS_PATH . "views/admin/staff/detail.view.php";