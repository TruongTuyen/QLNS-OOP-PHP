<?php
class UserObj { 
    protected $ID; 
    protected $email; 
    protected $matkhau; 
    protected $hoten; 
    protected $quyen; 
    protected $diachi; 
    protected $gioitinh; 
    protected $sodienthoai;
    protected $ngaytao;
    protected $ngaysua;

    public function set_ID($id){ 
        $this->ID = $id; 
    } 

    public function get_ID(){ 
        return $this->ID; 
    } 

    public function set_email($email){ 
        $this->email = $email; 
    } 

    public function get_email(){ 
        return $this->email; 
    } 

    public function set_password($password){ 
        $this->matkhau = $password; 
    } 

    public function get_password(){ 
        return $this->matkhau; 
    } 

    public function set_fullname($fullname){ 
        $this->hoten = $fullname; 
    } 

    public function get_fullname(){ 
        return $this->hoten; 
    } 

    public function set_role($role){ 
        $this->quyen = $role; 
    } 

    public function get_role(){ 
        return $this->quyen; 
    } 

    public function set_address($address){ 
        $this->diachi = $address; 
    } 

    public function get_address(){ 
        return $this->diachi; 
    } 

    public function set_sex($sex){ 
        $this->gioitinh = $sex; 
    } 

    public function get_sex(){ 
        return $this->gioitinh; 
    } 

    public function set_phone($number){
        $this->sodienthoai = $number;
    }
    
    public function get_phone(){
        return $this->sodienthoai;
    }
    
    
    public function set_date_created($date){
        $this->ngaytao = $date;
    }
    
    public function get_date_created(){
        return $this->ngaytao;
    }
    
    public function set_date_modified($date){
        $this->ngaysua = $date;
    }
    
    public function get_date_modified(){
        return $this->ngaysua;
    }
    
    
} 
?>