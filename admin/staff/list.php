<?php
    session_start();
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "models/staff/Staff.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    $list_staff = new Staff();
    $lists = $list_staff->get_list_staff();
    
    include Configs::ABS_PATH . "views/admin/staff/list.view.php";