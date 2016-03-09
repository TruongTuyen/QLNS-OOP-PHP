<?php
    class PhongbanObj{
        protected $maphongban;
        protected $tenphongban;
        protected $sdt;
        
        public function __construct(array$input){
            $this->set_maphongban($input['maphongban']);
            $this->set_tenphongban($input['tenphongban']);
            $this->set_sdt($input['sdt']);
        }
        
        public function set_maphongban($mapb){
            $this->maphongban = $mapb;
        }
        
        public function get_maphongban(){
            return $this->maphongban;
        }
        
        public function set_tenphongban($name){
            $this->tenphongban = $name;
        }
        
        public function get_tenphongban(){
            return $this->tenphongban;
        }
        
        public function set_sdt($sdt){
            $this->sdt = $sdt;
        }
        
        public function get_sdt(){
            return $this->sdt;
        }
        
    }