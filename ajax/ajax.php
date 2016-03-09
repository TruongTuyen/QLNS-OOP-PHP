<?php
    include "../configs/configs.php";
    include Configs::ABS_PATH . "models/chamcong/Chamcong.php";
    
    if(isset($_POST)){
        $method = $_POST["method"];
        $manv = $_POST["manv"];
        $date = date("Y-m-d");
        $trangthai = $_POST["trangthai"];
        
        $chamcong = new Chamcong();
        
        if($method == "add"){
            $id = $chamcong->check_chamcong_exist($manv,$date);
        
            if($id){
                //Tien hanh update
                $input = array("trangthai"=>$trangthai);
                $db_id = $chamcong->db_id;
                $update = $chamcong->update_chamcong_by_id($db_id,$input);
                if($update){
                    echo 1 ;
                }else{
                    echo 2;
                }
            }else{
                //Tien hanh insert
                $input = array("MaNV"=>$manv,"trangthai"=>$trangthai,"ngaylap"=>$date);
                $insert = $chamcong->add_chamcong($input);
                if($insert){
                    echo 1;
                }else{
                    echo 2;
                }
            }
        }//End method add
        
//        if($method = "get_status"){
//            $tinhtrang = $chamcong->tinhtrang_dilam("NV01",05);
//            $array = array();
//            
//            foreach($tinhtrang as $key=>$value){
//                $array["$key"] = $tinhtrang["$key"]->get_trangthai();
//            }
//            
//            die(json_encode($array));
//        }
        
    }
    
    
    
?>