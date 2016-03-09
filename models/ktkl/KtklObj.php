<?php
    class KtklObj{
        protected $ID;
        protected $maktkl;
        protected $loai;
        protected $lydo;
        protected $ngaylap;
        protected $hoten;
        
        public function __construct(array$input){
            $this->set_ID($input["ID"]);
            $this->set_maktkl($input["maktkl"]);
            $this->set_loai($input["loai"]);
            $this->set_lydo($input["lydo"]);
            $this->set_ngaylap($input["ngaylap"]);
            
            if(isset($input["hoten"])){
                $this->set_hoten($input["hoten"]);
            }
        }
        
        public function set_ID($id){
            $this->ID = $id;
        }
        
        public function get_ID(){
            return $this->ID;
        }
        
        public function set_maktkl($ma){
            $this->maktkl = $ma;
        }
        
        public function get_maktkl(){
            return $this->maktkl;
        }
        
        public function set_loai($loai){
            $this->loai = $loai;
        }
        
        public function get_loai(){
            return $this->loai;
        }
        
        public function set_lydo($lydo){
            $this->lydo = $lydo;
        }
        
        public function get_lydo(){
            return $this->lydo;
        }
        
        public function set_ngaylap($date){
            $this->ngaylap = $date;
        }
        
        public function get_ngaylap(){
            return $this->ngaylap;
        }
        
        public function set_hoten($hoten){
            $this->hoten = $hoten;
        }
        
        public function get_hoten(){
            return $this->hoten;
        }
    }