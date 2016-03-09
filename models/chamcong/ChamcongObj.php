<?php
    class ChamcongObj{
        protected $ID;
        protected $manv;
        protected $trangthai;
        protected $ngaylap;
        
        public function __construct(array$input){
            $this->set_id($input['ID']);
            $this->set_manv($input['MaNV']);
            $this->set_trangthai($input['trangthai']);
            $this->set_ngaylap($input['ngaylap']);
        }
        
        public function set_id($id){
            $this->ID = $id;
        }
        
        public function get_id(){
            return $this->ID;
        }
        
        public function set_manv($manv){
            $this->manv = $manv;
        }
        
        public function get_manv(){
            return $this->manv;
        }
        
        public function set_trangthai($trangthai){
            $this->trangthai = $trangthai;
        }
        
        public function get_trangthai(){
            return $this->trangthai;
        }
        
        public function set_ngaylap($date){
            $this->ngaylap = $date;
        }
        
        public function get_ngaylap(){
            return $this->ngaylap;
        }
        
    }