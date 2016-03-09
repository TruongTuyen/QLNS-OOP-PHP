<?php
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/hopdong/HopdongObj.php';
    
    class Hopdong{
        protected $db;
        
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_hopdong_by_id($id){
            $query = "SELECT * FROM hopdong WHERE mahd = '$id'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            //Khoi tao bien
            $hopdongObj = new HopdongObj($row);
            
            return $hopdongObj;
        }
        
        public function update_hopdong_by_id($id,array$data){
            $table = 'hopdong';
            $where = "mahd='$id'";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_hopdong_by_id($id){
            return $this->db->new_delete("hopdong",$id,"mahd='$id'");
        }
        
        public function add_hopdong(array$data){
            return $this->db->insert('hopdong',$data);
        }
        
        public function get_list_hopdong(){
            $query = "SELECT * FROM hopdong ORDER BY mahd ASC";
            $this->db->run_query($query);
            
            $list_hopdong = array();
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $hopdongObj = new HopdongObj($row);
                
                //gan gia tri cho mang
                $list_hopdong[] = $hopdongObj;
            }
            return $list_hopdong;
        }
}