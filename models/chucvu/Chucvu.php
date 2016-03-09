<?php
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/chucvu/ChucvuObj.php';
    
    class Chucvu{
        protected $db;
        
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_chucvu_by_id($id){
            $query = "SELECT * FROM chucvu WHERE machucvu = '$id'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            //Khoi tao bien
            $chucvuObj = new ChucvuObj($row);
            
            return $chucvuObj;
        }
        
        public function update_chucvu_by_id($id,array$data){
            $table = 'chucvu';
            $where = "machucvu='$id'";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_chucvu_by_id($id){
            return $this->db->new_delete("chucvu",$id,"machucvu='$id'");
        }
        
        public function add_chucvu(array$data){
            return $this->db->insert('chucvu',$data);
        }
        
        public function get_list_chucvu(){
            $query = "SELECT * FROM chucvu ORDER BY machucvu ASC";
            $this->db->run_query($query);
            
            $list_chucvu = array();
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $chucvuObj = new ChucvuObj($row);
                
                //gan gia tri cho mang
                $list_chucvu[] = $chucvuObj;
            }
            return $list_chucvu;
        }
}