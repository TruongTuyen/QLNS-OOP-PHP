<?php
    class Upload_image{
        public $file_name;
        public $ext_name;
        public $file_tmp_name;
        public $file_type;
        public $file_error;
        public $file_size;
        public $upload_dir;
        public $new_name;
        public $errors = array();
        public $allow_size;
        public $extensions = array();
        public $db_store_name;
        
        public function __construct($input_field,$upload_dir){
            $file = $_FILES[$input_field];
            $this->file_name = $file['name'];
            $this->file_type = $file['type'];
            $this->file_tmp_name = $file['tmp_name'];
            $this->file_error = $file['error'];
            $this->file_size = $file['size'];
            $this->set_file_type();
            $this->set_upload_dir($upload_dir);
            $this->get_file_extension();
        }
        
        public function check_choose_file(){
            if(empty($this->file_name)){
                $this->errors[] = "Hãy chọn tệp tin.";
                return false;
            }else{
                return true;
            }
        }
        
        public function get_file_extension(){
            $ext = explode(".",$this->file_name);
            $ext = end($ext);
            $this->ext_name = $ext; 
            return $this->ext_name; 
        }
        public function set_file_type(){
            $this->extensions = array("jpg","png","jpeg","gif");
            return $this->extensions;
        }
        
        public function check_file_type(){
            $file_ext = explode("/",$this->file_type);
            $file_ext = end($file_ext);
            $this->file_type = $file_ext;
            
            if(in_array($this->file_type,$this->extensions)){
                return true;
            }else{
                $this->errors[] = "Không hỗ trợ định dạng đã chọn.";
                return false;
            }
        }
        
        public function check_image_size($size = 500){
            $allow_size =$size * 1024;
            if($this->file_size > $allow_size){
                $this->errors[] = "Ảnh có kích thước quá lớn.";
                return false;
            }else{
                return true;
            }
        }
        
        public function set_upload_dir($dir){ //VD: uploads/
            if(file_exists($dir)){
                $this->upload_dir = $dir;
            }else{
                $this->errors[] = "Không tồn tại thư mục.";
            }
        }
        
        public function upload($prefix = "image."){
            //$new_name = $prefix.time().$this->ext_name;
            $this->db_store_name = $prefix.time().".".$this->ext_name;
            $dest = $this->upload_dir . $this->db_store_name;
            if(copy($this->file_tmp_name,$dest)){
                return true;
            }else{
                $this->errors[] = "Không thể upload";
                return false;
            }
        } 
        
        public function get_db_store_name(){
            return $this->db_store_name;
        }        
    }