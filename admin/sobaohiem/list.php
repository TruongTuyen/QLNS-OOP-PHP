<?php 
    session_start();
    
    include "../../configs/configs.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    $function = new My_function();
    $function->check_login();
    $function->check_admin();
    
    include Configs::ABS_PATH . "models/sobaohiem/Baohiem.php";
    
    $baohiem = new Baohiem();
    
    $list_sbh = $baohiem->get_list_baohiem();
    include Configs::ABS_PATH . "views/admin/sobaohiem/lists.view.php";