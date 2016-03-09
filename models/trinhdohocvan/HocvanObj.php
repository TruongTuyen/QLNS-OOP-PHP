<?php
    class HocvanObj{
        protected $matdhv;
        protected $trinhdohocvan;
        protected $chuyennganh;
        
        public function __construct(array$input){
            $this->set_matdhv($input['matdhv']);
            $this->set_tdhv($input['trinhdohocvan']);
            $this->set_chuyennganh($input['chuyennganh']);
        }
        
        public function set_matdhv($matdhv){
            $this->matdhv = $matdhv;
        }
        
        public function get_matdhv(){
            return $this->matdhv;
        }
        
        public function set_tdhv($name){
            $this->trinhdohocvan = $name;
        }
        
        public function get_tdhv(){
            return $this->trinhdohocvan;
        }
        
        public function set_chuyennganh($name){
            $this->chuyennganh = $name;
        }
        
        public function get_chuyennganh(){
            return $this->chuyennganh;
        }
        
        
    }