<?php
    class StaffObj{
        protected $staff_id;
        protected $staff_fullname;
        protected $staff_birthday;
        protected $staff_sex;
        protected $staff_address;
        protected $staff_folk;
        protected $staff_religion;
        protected $staff_person_id;
        protected $staff_department;
        protected $staff_office;
        protected $staff_literacy_id;
        protected $staff_foreign_language;
        protected $staff_constract_id;
        protected $staff_insurance_id;
        protected $staff_felicitation_discipline_id;
        protected $staff_phone;
        protected $staff_avatar;
        protected $note;
        
        public function __construct(array$row){
            $this->set_staff_id($row['manv']);
            $this->set_staff_fullname($row['hoten']);
            $this->set_staff_birthday($row['ngaysinh']);
            $this->set_staff_address($row['diachi']);
            $this->set_staff_sex($row['gioitinh']);
            $this->set_staff_folk($row['dantoc']);
            $this->set_staff_religion($row['tongiao']);
            $this->set_staff_person_id($row['cmtnd']);
            $this->set_staff_department($row['maphongban']);
            $this->set_staff_office($row['machucvu']);
            $this->set_staff_literacy_id($row['matdhv']);
            $this->set_staff_foreign_language($row['ngoaingu']);
            $this->set_staff_constract_id($row['mahd']);
            $this->set_staff_insurance_id($row['masbh']);
            $this->set_staff_felicitation_discipline_id($row['makt_kl']);
            $this->set_staff_phone($row['sdt']);
            $this->set_staff_avatar($row['anh']);
            $this->set_note($row['ghichu']);
        }
        
        public function set_staff_id($id){
            $this->staff_id = $id;
        }
        
        public function get_staff_id(){
            return $this->staff_id;
        }
        
        public function set_staff_person_id($id){
            $this->staff_person_id = $id;
        }
        
        public function get_staff_person_id(){
            return $this->staff_person_id;
        }
        
        public function set_staff_constract_id($id){
            $this->staff_constract_id = $id;
        }
        
        public function get_staff_constract_id(){
            return $this->staff_constract_id;
        }
        
        public function set_staff_insurance_id($id){
            $this->staff_insurance_id = $id;
        }
        
        public function get_staff_insurance_id(){
            return $this->staff_insurance_id;
        }
        
        public function set_staff_felicitation_discipline_id($id){
            $this->staff_felicitation_discipline_id = $id;
        }
        
        public function get_staff_felicitation_discipline_id(){
            return $this->staff_felicitation_discipline_id;
        }
        
        public function set_staff_fullname($name){
            $this->staff_fullname = $name;
        }
        
        public function get_staff_fullname(){
            return $this->staff_fullname;
        }
        
        public function set_staff_birthday($birthday){
            $this->staff_birthday = $birthday;
        }
        
        public function get_staff_birthday(){
            return $this->staff_birthday;
        }
        
        public function set_staff_sex($sex){
            $this->staff_sex = $sex;
        }
        
        public function get_staff_sex(){
            return $this->staff_sex;
        }
        
        public function set_staff_address($address){
            $this->staff_address = $address;
        }
        
        public function get_staff_address(){
            return $this->staff_address;
        }
        
        public function set_staff_religion($religion){
            $this->staff_religion = $religion;
        }
        
        public function get_staff_religion(){
            return $this->staff_religion;
        }
        
        public function set_staff_department($departement){
            $this->staff_department = $departement;
        }
        
        public function get_staff_department(){
            return $this->staff_department;
        }
        
        public function set_staff_office($office){
            $this->staff_office = $office;
        }
        
        public function get_staff_office(){
            return $this->staff_office;
        }
        
        public function set_staff_literacy_id($literacy_id){
            $this->staff_literacy_id = $literacy_id;
        }
        
        public function get_staff_literacy_id(){
            return $this->staff_literacy_id;
        }
        
        public function set_staff_foreign_language($language){
            $this->staff_foreign_language = $language;
        }
        
        public function get_staff_foreign_language(){
            return $this->staff_foreign_language;
        }
        
        public function set_staff_phone($phone){
            $this->staff_phone = $phone;
        }
        
        public function get_staff_phone(){
            return $this->staff_phone;
        }
        
        public function set_note($note){
            $this->note = $note;
        }
        
        public function get_note(){
            return $this->note;
        }
        
        public function set_staff_folk($folk){
            $this->staff_folk = $folk;
        }
        
        public function get_staff_folk(){
            return $this->staff_folk;
        }
        
        public function set_staff_avatar($image_url){
            $this->staff_avatar = $image_url;
        }
        
        public function get_staff_avatar(){
            return $this->staff_avatar;
        }
    }