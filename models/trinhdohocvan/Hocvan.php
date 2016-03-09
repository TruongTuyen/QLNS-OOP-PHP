<?php
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/trinhdohocvan/HocvanObj.php';
    
    class Hocvan{
        protected $db;
        
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_hocvan_by_id($id){
            $query = "SELECT * FROM trinhdohocvan WHERE matdhv = '$id'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            //Khoi tao bien
            $hocvanObj = new HocvanObj($row);
            
            return $hocvanObj;
        }
        
        public function update_hocvan_by_id($id,array$data){
            $table = 'trinhdohocvan';
            $where = "matdhv='$id'";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_hocvan_by_id($id){
            return $this->db->new_delete("trinhdohocvan",$id,"matdhv='$id'");
        }
        
        public function add_hocvan(array$data){
            return $this->db->insert('trinhdohocvan',$data);
        }
        
        public function get_list_hocvan(){
            $query = "SELECT * FROM trinhdohocvan ORDER BY matdhv ASC";
            $this->db->run_query($query);
            
            $list_hocvan = array();
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $hocvanObj = new HocvanObj($row);
                
                //gan gia tri cho mang
                $list_hocvan[] = $hocvanObj;
            }
            return $list_hocvan;
        }
}