<?php
    include "../../configs/configs.php";
    include Configs::ABS_PATH."models/ktkl/Ktkl.php";
    
    $kt = new Ktkl();
    $default_month = date("m");
    $list_kt = $kt->get_list_khenthuong($default_month);
    $list_month = $kt->get_list_month();
    
    include Configs::ABS_PATH . "views/admin/tonghop/list_kt_kl.view.php";
