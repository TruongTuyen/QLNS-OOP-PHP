<?php
    include "../configs/configs.php";
    include Configs::ABS_PATH."models/ktkl/Ktkl.php";
    include Configs::ABS_PATH . "libraries/function.class.php";
    
    $function  = new My_function();
    
    $thang = $function->validate_input_form($_POST["month"]);
    $loai = $function->validate_input_form(($_POST["type"]));
    $kt = new Ktkl();
    $kl = new Ktkl();
    
    if($loai == 1){//Danh sach khen thuong
        $list = $kt->get_list_khenthuong($thang);
        
        $output = array();
        foreach($list as $key=>$value){
            $db_loai = $value->get_loai();
            if($db_loai == 1){
                $loai_out = "Khen Thưởng";
            }else{
                $loai_out = "Kỷ Luật";
            }
            
            
            $output[$key]["hoten"] = $value->get_hoten();
            $output[$key]["maktkl"] = $value->get_maktkl();
            $output[$key]["loai"] = $loai_out;
            $output[$key]["lydo"] = $value->get_lydo();
            $output[$key]["ngaylap"] = $value->get_ngaylap();
        }
        
        die(json_encode($output));
    }
    if($loai == 2){//Danh sach ky luat
        $list_kl = $kl->get_list_kyluat($thang);
        
        $output = array();
        foreach($list_kl as $key=>$value){
            $db_loai = $value->get_loai();
            if($db_loai == 1){
                $loai_out = "Khen Thưởng";
            }else{
                $loai_out = "Kỷ Luật";
            }
            
            
            $output[$key]["hoten"] = $value->get_hoten();
            $output[$key]["maktkl"] = $value->get_maktkl();
            $output[$key]["loai"] = $loai_out;
            $output[$key]["lydo"] = $value->get_lydo();
            $output[$key]["ngaylap"] = $value->get_ngaylap();
        }
        
        die(json_encode($output));
    }