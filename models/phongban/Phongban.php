<?php
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/phongban/PhongbanObj.php';
    
    class Phongban{
        protected $db;
        
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_phongban_by_id($id){
            $query = "SELECT * FROM phongban WHERE maphongban = '$id'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            //Khoi tao bien
            $phongbanObj = new PhongbanObj($row);
            
            return $phongbanObj;
        }
        
        public function update_phongban_by_id($id,array$data){
            $table = 'phongban';
            $where = "maphongban='$id'";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_phongban_by_id($id){
            return $this->db->new_delete("phongban",$id,"maphongban='$id'");
        }
        
        public function add_phongban(array$data){
            return $this->db->insert('phongban',$data);
        }
        
        public function get_list_phongban(){
            $query = "SELECT * FROM phongban ORDER BY maphongban ASC";
            $this->db->run_query($query);
            
            $list_phongban = array();
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $phongbanObj = new PhongbanObj($row);
                
                //gan gia tri cho mang
                $list_phongban[] = $phongbanObj;
            }
            return $list_phongban;
        }
}