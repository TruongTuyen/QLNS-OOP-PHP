<?php
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/chamcong/ChamcongObj.php';
    
    class Chamcong{
        protected $db;
        public  $db_id;
        public function __construct(){
            $this->db = new Db();
        }
        
        public function get_chamcong_by_id($id){
            $query = "SELECT * FROM chamcong WHERE ID = $id";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            
            //Khoi tao bien
            $chamcongOBJ = new ChamcongObj($row);
            
            return $chamcongOBJ;
        }
        
        public function update_chamcong_by_id($id,array$data){
            $table = 'chamcong';
            $where = "ID=$id";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete_chamcong_by_id($id){
            return $this->db->new_delete("chamcong",$id,"ID=$id");
        }
        
        public function add_chamcong(array$data){
            return $this->db->insert('chamcong',$data);
        }
        
        public function get_list_chamcong(){
            $query = "SELECT * FROM chamcong ORDER BY ID ASC";
            $this->db->run_query($query);
            
            $list_chamcong = array();
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $chamcongObj = new ChamcongObj($row);
                
                //gan gia tri cho mang
                $list_chamcong[] = $chamcongObj;
            }
            return $list_chamcong;
        }
        
        public function check_chamcong_exist($manv,$time){
            $query = "SELECT * FROM chamcong WHERE MaNV ='$manv' AND ngaylap ='$time'";
            $result = $this->db->run_query($query);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $this->db_id = $row["ID"];
                return true;
            }else{
                return false;
            }
        }
        
        public function get_list_trangthai_chamcong_by_date($date){
            $query = "SELECT * FROM chamcong WHERE ngaylap='$date'";
            $this->db->run_query($query);
            $list_trangthai = array();
            while($row = $this->db->get_fetch()){
                $chamcongObj = new ChamcongObj($row);
                $list_trangthai[] = $chamcongObj;
            }
            return $list_trangthai;
            
        }
        
        public function tinhtrang_dilam($manv,$month){
            $query = "select * from chamcong where Month(ngaylap)=$month AND MaNV='$manv' LIMIT 0,31";
            $this->db->run_query($query);
            $tinhtrang_dilam = array();
            while($row = $this->db->get_fetch()){
                $chamcongObj = new ChamcongObj($row);
                $db_date = $chamcongObj->get_ngaylap();
                
                $date = date_create($db_date);
                $date_format =  date_format($date, 'd');
                $tinhtrang_dilam[$date_format] = $chamcongObj;
            }
            return $tinhtrang_dilam;
        }
        
        public function get_trangthai_nv($manv,$date){
            $query = "SELECT trangthai FROM chamcong WHERE MaNV='$manv' AND ngaylap='$date'";
            $this->db->run_query($query);
            $row = $this->db->get_fetch();
            return $row["trangthai"];
        }
}