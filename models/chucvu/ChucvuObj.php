<?php
    class ChucvuObj{
        protected $machucvu;
        protected $tenchucvu;
        
        public function __construct(array$input){
            $this->set_machucvu($input['machucvu']);
            $this->set_tenchucvu($input['tenchucvu']);
        }
        
        public function set_machucvu($id){
            $this->machucvu = $id;
        }
        
        public function get_machucvu(){
            return $this->machucvu;
        }
        
        public function set_tenchucvu($name){
            $this->tenchucvu = $name;
        }
        
        public function get_tenchucvu(){
            return $this->tenchucvu;
        }
        
    }