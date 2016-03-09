<?php 
    //require '../../configs/configs.php';
    require_once Configs::ABS_PATH . 'models/Db.php'; 
    require_once Configs::ABS_PATH . 'models/user/UserObj.php'; 
    
    class User { 
        protected $db; 
    
        public function __construct(){ 
            $this->db = new Db(); 
        } 
        
        public function update_pass_by_email($email,$newpass){
            $table = "nguoidung";
            $data = array('matkhau'=>$newpass);
            $where = "email='$email' LIMIT 1";// where email=email
            if($this->db->update($table,$data,$where)){
                return true;
            
            }else{
                return false;
            }
        }
        
        public function update_pass_by_id($id,$newpass){
            $table = 'nguoidung';
            $data = array("matkhau"=>$newpass);
            $where = "id=$id";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function update_user_by_id($id,array$data){
            $table = 'nguoidung';
            $where = "id=$id";
            if($this->db->update($table,$data,$where)){
                return true;
            }else{
                return false;
            }
        }
        
        public function get_by_email($email){ 
            //SQL 
            $query = "SELECT * FROM nguoidung WHERE email = '{$email}'"; //Chi chon user co trang thai da kich hoat  
            $this->db->run_query($query); 
            $row = $this->db->get_fetch(); 
            $userObj = new UserObj(); 
    
            //Gán thông tin 
            $userObj->set_ID($row['id']);
            $userObj->set_address($row['diachi']);
            $userObj->set_date_created($row['ngaytao']); 
            $userObj->set_date_modified($row['ngaysua']);
            $userObj->set_email($row['email']);
            $userObj->set_fullname($row['hoten']);
            $userObj->set_password($row['matkhau']);
            $userObj->set_phone($row['sodienthoai']);
            $userObj->set_role($row['quyen']);
            $userObj->set_sex($row['gioitinh']);
    
            //Return 
            return $userObj; 
        } 
        
        public function get_by_id($id){ 
            //SQL 
            $query = "SELECT * FROM nguoidung WHERE id = '{$id}'"; 
            $this->db->run_query($query); 
            $row = $this->db->get_fetch(); 
            $userObj = new UserObj(); 
    
            //Gán thông tin 
            $userObj->set_ID($row['id']);
            $userObj->set_address($row['diachi']);
            $userObj->set_date_created($row['ngaytao']); 
            $userObj->set_date_modified($row['ngaysua']);
            $userObj->set_email($row['email']);
            $userObj->set_fullname($row['hoten']);
            $userObj->set_password($row['matkhau']);
            $userObj->set_phone($row['sodienthoai']);
            $userObj->set_role($row['quyen']);
            $userObj->set_sex($row['gioitinh']);
    
            //Return 
            return $userObj; 
        } 
        
        public function get_list_user(){
            $query = "SELECT * FROM nguoidung ORDER BY id DESC";
            $this->db->run_query($query);
            
            // Khoi tao mang de luu gia tri sau moi vong lap while
            $list_user = array();
            
            while($row = $this->db->get_fetch()){
                //Khoi tao
                $userObj = new UserObj();
                
                //gan gia tri
                $userObj->set_ID($row['id']);
                $userObj->set_address($row['diachi']);
                $userObj->set_date_created($row['ngaytao']); 
                $userObj->set_date_modified($row['ngaysua']);
                $userObj->set_email($row['email']);
                $userObj->set_fullname($row['hoten']);
                $userObj->set_password($row['matkhau']);
                $userObj->set_phone($row['sodienthoai']);
                $userObj->set_role($row['quyen']);
                $userObj->set_sex($row['gioitinh']);
        
                //gan gia tri cho mang
                $list_user[] = $userObj;
            }
            return $list_user;
        }  
        
        public function add_user(array$data){
            return $this->db->insert('nguoidung',$data);
        }
        
        public function delete_user($id){
            return $this->db->delete("nguoidung",$id);
        }
    
    } 
    
    //Test 
    
    
?>