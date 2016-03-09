<?php
    //require '../../configs/configs.php';
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/staff/StaffObj.php';
    
    class Staff{
        protected $db;
        
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_staff_by_id($id){
            $query = "SELECT * FROM hosonhanvien WHERE manv = '$id'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            //Khoi tao bien
            $staffObj = new StaffObj($row);
            
            
            return $staffObj;
        }
        
        public function update_staff_by_id($id,array$data){
            $table = 'hosonhanvien';
            $where = "manv='$id'";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_staff_by_id($id){
            return $this->db->new_delete("hosonhanvien",$id,"manv='$id'");
        }
        
        public function add_staff(array$data){
            return $this->db->insert('hosonhanvien',$data);
        }
        
        public function get_list_staff(){
            $query = "SELECT * FROM hosonhanvien ORDER BY manv ASC";
            $this->db->run_query($query);
            
            $list_staff = array();
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $staffObj = new StaffObj($row);
                
                //gan gia tri cho mang
                $list_staff[] = $staffObj;
            }
            return $list_staff;
        }
    }