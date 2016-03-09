<?php 
    //include "../configs/configs.php";
    class My_mysqli{
        protected $result;
        public $conn;
        
        public function __construct(){
            $this->conn = mysqli_connect(Configs::DB_SERVER, Configs::DB_USERNAME, Configs::DB_PASSWORD, Configs::DB_NAME) or die('Could not connect to database !');
            mysqli_query($this->conn,'SET NAMES UTF8');
            mysqli_query($this->conn,"SET NAMES 'utf8'");
            mysqli_query($this->conn,"SET CHARACTER SET utf8");
            mysqli_query($this->conn,"SET CHARACTER_SET_CONNECTION=utf8");
            mysqli_query($this->conn,"SET SQL_MODE = ''");
        }
        
        public function run_query($query){
            $this->result = mysqli_query($this->conn,$query);
            return $this->result;
        }
        
        public function get_fetch(){
            return $row = mysqli_fetch_assoc($this->result);
        }
        
        public function update($table,array$data,$where){
            /*
            @ $data co dang $data = array('cot'=>'giatri');
            @ vidu: update('nguoidung',array('matkhau'=>'abc'),'id=1')
            @
            */
            $query = "";
            foreach($data as $key=>$value){
                if(is_numeric($value)){
                    $query .= "$key = ".mysqli_real_escape_string($this->conn,$value).",";
                }else{
                    $query .= "$key = '".mysqli_real_escape_string($this->conn,$value)."',";
                }
                
            }
            $new_query = "UPDATE $table SET ".trim($query,',')." WHERE $where";
            $this->run_query($new_query);
            if(mysqli_affected_rows($this->conn) > 0){
                return true;
            }else{
                return false;
            }
        }
        
        public function insert($table,array$data){
            /* $data co dang $data = array("cot"=>"giatri");
            * vi du: insert("nguoidung",array("hoten"=>"a","gioitinh"=>"nam"))
            *
            */
            
            $list_keys = "";
            $list_values = "";
            foreach($data as $key=>$value){
                $list_keys .= "$key,";
                if($value == "NOW()" || $value == "NULL"){
                    $list_values .= "$value,";
                }else{
                    $list_values .= "'$value',";
                }
                
            }
            $query = "INSERT INTO $table (".trim($list_keys,",").") VALUES (".trim($list_values,",").")";
            $this->run_query($query);
            if(mysqli_affected_rows($this->conn)>0){
                return true;
            }else{
                return false;
            }
        }
        
        public function delete($table,$id){
            if(is_numeric($id)){
                $query = "DELETE FROM $table WHERE id=$id LIMIT 1";
            }else{
                $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
            }
            
            $this->run_query($query);
            if(mysqli_affected_rows($this->conn)){
                return true;
            }else{
                return false;
            }
        }
        
        public function new_delete($table,$id,$where){
            $query = "DELETE FROM $table WHERE $where LIMIT 1";
            
            $this->run_query($query);
            if(mysqli_affected_rows($this->conn)){
                return true;
            }else{
                return false;
            }
        }
        
    }
//    
//    $test = new My_mysqli();
//    $table = "test";
//    $id = 18;
//    
//    if($test->delete($table,$id)){
//        echo "Delete thanh cong";
//    }else{
//        echo "Khong delete duoc";
//    }
//

?>