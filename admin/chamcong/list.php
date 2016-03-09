<?php 
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/hopdong/Hopdong.php";
    
    $hopdong = new Hopdong();
    
    $list_hd = $hopdong->get_list_hopdong();
    include Configs::ABS_PATH . "views/admin/hopdong/lists.view.php";