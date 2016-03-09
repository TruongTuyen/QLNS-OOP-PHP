<?php
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/ktkl/KtklObj.php';
    
    class Ktkl{
        protected $db;
        
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_ktkl_by_id($id){
            $query = "SELECT * FROM khenthuong_kyluat WHERE ID = $id";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            //Khoi tao bien
            $ktklObj = new KtklObj($row);
            
            return $ktklObj;
        }
        
        public function update_ktkl_by_id($id,array$data){
            $table = 'khenthuong_kyluat';
            $where = "ID=$id";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_ktkl_by_id($id){
            return $this->db->new_delete("khenthuong_kyluat",$id,"ID=$id");
        }
        
        public function add_ktkl(array$data){
            return $this->db->insert('khenthuong_kyluat',$data);
        }
        
        public function get_list_ktkl(){
            $query = "SELECT khenthuong_kyluat .*, hoten FROM khenthuong_kyluat INNER JOIN hosonhanvien  WHERE khenthuong_kyluat .maktkl= hosonhanvien  .makt_kl ORDER BY ID ASC";
            $this->db->run_query($query);
            
            $list_ktkl = array();
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $ktklObj = new KtklObj($row);
                
                //gan gia tri cho mang
                $list_ktkl[] = $ktklObj;
            }
            return $list_ktkl;
        }
        
        public function get_list_khenthuong($month){
            $query = "SELECT khenthuong_kyluat .*, hoten FROM khenthuong_kyluat INNER JOIN hosonhanvien  WHERE khenthuong_kyluat .maktkl= hosonhanvien  .makt_kl AND loai=1 AND Month(ngaylap)=$month ORDER BY ID ASC";
            $this->db->run_query($query);
            
            $list_khenthuong = array();
            while($row = $this->db->get_fetch()){
                $ktObj = new KtklObj($row);
                $list_khenthuong[] = $ktObj;
            }
            return $list_khenthuong;
        }
        public function get_list_kyluat($month){
            $query = "SELECT khenthuong_kyluat .*, hoten FROM khenthuong_kyluat INNER JOIN hosonhanvien  WHERE khenthuong_kyluat .maktkl= hosonhanvien  .makt_kl AND loai=2 AND Month(ngaylap)=$month ORDER BY ID ASC";
            $this->db->run_query($query);
            
            $list_kyluat = array();
            while($row = $this->db->get_fetch()){
                $klObj = new KtklObj($row);
                $list_kyluat[] = $klObj;
            }
            return $list_kyluat;
        }
        public function get_list_month(){
            $query = "SELECT DISTINCT MONTH(ngaylap) AS thang FROM khenthuong_kyluat ";
            $this->db->run_query($query);
            $list_month = array();
            
            while($row = $this->db->get_fetch()){
                $list_month[] = $row["thang"];
            }
            return $list_month;
        }
}