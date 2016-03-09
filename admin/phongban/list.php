<?php 
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/phongban/Phongban.php";
    
    $phongban = new Phongban();
    
    $list_pb = $phongban->get_list_phongban();
    include Configs::ABS_PATH . "views/admin/phongban/lists.view.php";