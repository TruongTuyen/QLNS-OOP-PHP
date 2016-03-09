<?php 
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/chucvu/Chucvu.php";
    
    $chucvu = new Chucvu();
    
    $list_cv = $chucvu->get_list_chucvu();
    include Configs::ABS_PATH . "views/admin/chucvu/lists.view.php";