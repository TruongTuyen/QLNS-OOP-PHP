<?php
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/luongthoathuan/LuongObj.php';
    
    class Luong{
        protected $db;
        
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_luong_by_id($manv){
            $query = "SELECT * FROM thongtinluong WHERE manv = '$manv'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            //Khoi tao bien
            $luongObj = new LuongObj($row);
            
            return $luongObj;
        }
        
        public function update_luong_by_id($manv,array$data){
            $table = 'thongtinluong';
            $where = "manv='$manv'";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_luong_by_id($manv){
            return $this->db->new_delete("thongtinluong",$id,"manv='$manv'");
        }
        
        public function add_luong(array$data){
            return $this->db->insert('thongtinluong',$data);
        }
        
        public function get_list_luong(){
            $query = "SELECT thongtinluong.*, hoten FROM thongtinluong INNER JOIN hosonhanvien  WHERE thongtinluong.manv= hosonhanvien  .manv ORDER BY manv ASC";
            $this->db->run_query($query);
            
            $list_luong = array();
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $luongObj = new LuongObj($row);
                
                //gan gia tri cho mang
                $list_luong[] = $luongObj;
            }
            return $list_luong;
        }
}