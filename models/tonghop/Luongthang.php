<?php
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    //require_once Configs::ABS_PATH . 'models/tonghop/LuongthangObj.php';
    
    class Luongthang{
        public $db;
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_list_thang(){
            $query = "SELECT DISTINCT Month(ngaylap) AS thang FROM chamcong ORDER BY thang DESC";  
            $this->db->run_query($query);
            
            $list_thang = array();
            while($row = $this->db->get_fetch()){
                $list_thang[] = $row["thang"];
            }  
            return $list_thang;
        }
        
        public function get_so_ngay_cong($manv,$thang){
            $query = "SELECT Count(manv) AS songaycong From chamcong Where Month(ngaylap) = {$thang} AND trangthai = 1 AND manv='{$manv}'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            return $songaycong = $row["songaycong"];
        }
        
        public function get_luongcoban_hesoluong($manv){
            $query = "SELECT *  FROM thongtinluong Where manv = '$manv'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            return $row;
        }
        
        public function tinh_luong_thuc_linh($songaycong,$luongcoban,$hesoluong){
            $tong_luong = $songaycong * $luongcoban * $hesoluong;
            return $tong_luong;
        }
        
        public function currency_format($number){
            return number_format($number).' VNĐ<br>';
        }
    }

