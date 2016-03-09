<?php
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/sobaohiem/BaohiemObj.php';
    
    class Baohiem{
        protected $db;
        
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_baohiem_by_id($id){
            $query = "SELECT * FROM sobaohiem WHERE masbh = '$id'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            //Khoi tao bien
            $baohiemObj = new BaohiemObj($row);
            
            return $baohiemObj;
        }
        
        public function update_baohiem_by_id($id,array$data){
            $table = 'sobaohiem';
            $where = "masbh='$id'";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_baohiem_by_id($id){
            return $this->db->new_delete("sobaohiem",$id,"masbh='$id'");
        }
        
        public function add_baohiem(array$data){
            return $this->db->insert('sobaohiem',$data);
        }
        
        public function get_list_baohiem(){
            $query = "SELECT * FROM sobaohiem ORDER BY masbh ASC";
            $this->db->run_query($query);
            
            $list_baohiem = array();
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $baohiemObj = new BaohiemObj($row);
                
                //gan gia tri cho mang
                $list_baohiem[] = $baohiemObj;
            }
            return $list_baohiem;
        }
}