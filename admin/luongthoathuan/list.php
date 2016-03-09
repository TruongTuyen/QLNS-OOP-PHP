<?php 
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/luongthoathuan/Luong.php";
    
    $luong = new Luong();
    
    $list_luong = $luong->get_list_luong();
	
    include Configs::ABS_PATH . "views/admin/luongthoathuan/lists.view.php";