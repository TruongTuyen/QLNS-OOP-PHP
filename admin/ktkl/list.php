<?php 
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/ktkl/Ktkl.php";
    
    $ktkl = new Ktkl();
    
    $list_ktkl = $ktkl->get_list_ktkl();
    include Configs::ABS_PATH . "views/admin/ktkl/lists.view.php";