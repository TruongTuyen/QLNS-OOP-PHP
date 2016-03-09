<?php
    class LuongObj{
        protected $manv;
        protected $luongcoban;
        protected $hesoluong;
        protected $hoten;
        public function __construct(array$input){
            $this->set_manv($input['manv']);
            $this->set_luongcoban($input['luongcoban']);
            $this->set_hesoluong($input['hesoluong']);
            
            if(isset($input["hoten"])){
                $this->set_hoten($input["hoten"]);
            }
        }
        public function set_hoten($hoten){
            $this->hoten = $hoten;
        }
        
        public function get_hoten(){
            return $this->hoten;
        }
        
        public function set_manv($manv){
            $this->manv = $manv;
        }
        
        public function get_manv(){
            return $this->manv;
        }
        
        public function set_luongcoban($luongcoban){
            $this->luongcoban = $luongcoban;
        }
        
        public function get_luongcoban(){
            return $this->luongcoban;
        }
        
        public function set_hesoluong($hesoluong){
            $this->hesoluong = $hesoluong;
        }
        
        public function get_hesoluong(){
            return $this->hesoluong;
        }
        
        
        
    }