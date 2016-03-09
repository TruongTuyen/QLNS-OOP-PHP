<?php 
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/trinhdohocvan/Hocvan.php";
    
    $hocvan = new Hocvan();
    
    $list_hv = $hocvan->get_list_hocvan();
    include Configs::ABS_PATH . "views/admin/trinhdohocvan/lists.view.php";