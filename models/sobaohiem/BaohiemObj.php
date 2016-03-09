<?php
    class BaohiemObj{
        protected $masbh;
        protected $ngaycap;
        protected $nơicap;
        protected $ghichu;
        
        public function __construct(array$input){
            $this->set_masbh($input['masbh']);
            $this->set_ngaycap($input['ngaycap']);
            $this->set_noicap($input['noicap']);
            $this->set_ghichu($input['ghichu']);
        }
        
        public function set_masbh($masbh){
            $this->masbh = $masbh;
        }
        
        public function get_masbh(){
            return $this->masbh;
        }
        
        public function set_noicap($where){
            $this->noicap = $where;
        }
        
        public function get_noicap(){
            return $this->noicap;
        }
        
        public function set_ngaycap($date){
            $this->ngaycap = $date;
        }
        
        public function get_ngaycap(){
            return $this->ngaycap;
        }
        
        public function set_ghichu($note){
            $this->ghichu = $note;
        }
        
        public function get_ghichu(){
            return $this->ghichu;
        }
        
    }