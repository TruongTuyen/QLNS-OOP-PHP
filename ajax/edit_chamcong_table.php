<?php
    include "../configs/configs.php";
    include Configs::ABS_PATH . "models/chamcong/Chamcong.php";
    
    $chamcong = new Chamcong();
    $nam = date("Y");
    $thang = date("m");
    $day = $_POST["data"];
    $method = $_POST["method"];
    $date = "$nam-$thang-$day";
    $manv = $_POST["manv"];
    
    
    $current_day = date("d");
    
    if($method == "edit"){
        if($day<=$current_day){
            $id = $chamcong->check_chamcong_exist($manv,$date);
            
            if($id){
                //Tien hanh update
                $db_trangthai = $chamcong->get_trangthai_nv($manv,$date);
                if($db_trangthai == 1){
                    $trangthai = 2;
                }else{
                    $trangthai = 1;
                }
                $input = array("trangthai"=>$trangthai);
                $db_id = $chamcong->db_id;
                $update = $chamcong->update_chamcong_by_id($db_id,$input);
                if($update){
                    $return_val = "sucess";
                }else{
                    $return_val = "failed";
                }
                
            }else{
                //Tien hanh insert
                $input = array("MaNV"=>$manv,"trangthai"=>1,"ngaylap"=>$date);
                $insert = $chamcong->add_chamcong($input);
                if($insert){
                    $return_val = "sucess";
                }else{
                    $return_val = "failed";
                }
                
            }
         } //End kiem tra ngay da chon  
    }//End method edit
    
    $ngay_thang = array(
    "01"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"),
    "02"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28"),
    "03"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"),
    "04"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"),
    "05"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"),
    "06"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"),
    "07"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"),
    "08"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"),
    "09"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"),
    "10"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"),
    "11"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"),
    "12"=>array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"),
    
    ); 
    
        
    $tinhtrang = $chamcong->tinhtrang_dilam($manv,$thang);//Truyen du lieu vao day
    $array = array();
    $output = array();
    
    foreach($tinhtrang as $key=>$value){
        $array[$key] = $tinhtrang[$key]->get_trangthai();
    }
    
//    $output["tinhtrang"] = $array;
//    $output["ngaythang"] = $ngay_thang["$thang"];
//    $output["re_val"] = $return_val;
//    $output["manv"] = $manv;
//    die(json_encode($output));
    $db_trangthai_new = $chamcong->get_trangthai_nv($manv,$date);
    $output["ketqua"] = $return_val;
    $output["trangthai"] = $db_trangthai_new;
    die(json_encode($output));
?>