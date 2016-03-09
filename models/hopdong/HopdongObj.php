<?php
    class HopdongObj{
        protected $mahd;
        protected $tenhd;
        protected $ngayky;
        protected $ngayhethan;
        
        public function __construct(array$input){
            $this->set_mahd($input['mahd']);
            $this->set_tenhd($input['tenhopdong']);
            $this->set_ngayky($input['ngaykiket']);
            $this->set_ngayhethan($input['ngayhethan']);
        }
        
        public function set_mahd($mahd){
            $this->mahd = $mahd;
        }
        
        public function get_mahd(){
            return $this->mahd;
        }
        
        public function set_tenhd($name){
            $this->tenhd = $name;
        }
        
        public function get_tenhd(){
            return $this->tenhd;
        }
        
        public function set_ngayky($date){
            $this->ngayky = $date;
        }
        
        public function get_ngayky(){
            return $this->ngayky;
        }
        
        public function set_ngayhethan($date){
            $this->ngayhethan = $date;
        }
        
        public function get_ngayhethan(){
            return $this->ngayhethan;
        }
        
    }