<?php
    include "../configs/configs.php";
    include Configs::ABS_PATH."models/tonghop/Luongthang.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    include Configs::ABS_PATH ."models/staff/Staff.php";
    
    $function  = new My_function();
    
    $thang = $function->validate_input_form($_POST["month"]);
    $luong_thang = new Luongthang();
    $list_nhanvien = new Staff();
    
    if(!empty($thang)){//Danh sach khen thuong
        $list_staff = $list_nhanvien->get_list_staff();
        $output = array();
        $i =1;
         foreach($list_staff as $key=>$value){
             $manv = $value->get_staff_id();
             $fullname = $value->get_staff_fullname();
             $songaycong = $luong_thang->get_so_ngay_cong($value->get_staff_id(),$thang);
             $luongcb_hesoluong = $luong_thang->get_luongcoban_hesoluong($value->get_staff_id());
             
             $luong_thuc_linh = $luong_thang->tinh_luong_thuc_linh($songaycong,$luongcb_hesoluong["luongcoban"],$luongcb_hesoluong["hesoluong"]);
             $luong_formated = $luong_thang->currency_format($luong_thuc_linh);  
                
             //Lưu giá trị
             $output[$i]["manv"] = $manv;
             $output[$i]["fullname"] = $fullname;
             $output[$i]["songaycong"] = $songaycong;
             $output[$i]["luongthuclinh"] = $luong_formated;   
             
             $i++;
         }//End foreach
        die(json_encode($output));
    }