<?php
    include "../../configs/configs.php";
    include Configs::ABS_PATH."models/tonghop/Luongthang.php";
    include Configs::ABS_PATH ."models/staff/Staff.php";
    
    $luong_thang = new Luongthang();
    $staff = new Staff();
    //$default_month = date("m");
//    $list_kt = $kt->get_list_khenthuong($default_month);
    $list_month = $luong_thang->get_list_thang();
    $list_staff = $staff->get_list_staff();
    
    include Configs::ABS_PATH . "views/admin/tonghop/list_luong_thang.view.php";
