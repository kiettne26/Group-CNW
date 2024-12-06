<?php
    class Ca{
        //properties
        private $ID;
        private $Name;
        private $Description;
        private $Image;

        //methods
        public function __construct($ID, $Name, $Description,$Image){
            $this->ID = $ID;
            $this->Name = $Name;
            $this->Description = $Description;
            $this ->Image = $Image;
        }

        public function getID(){
            return $this->ID;
        }

        public function getName(){
            return $this->Name;
        }

        public function getDescription(){
            return $this->Description;
        }
        public function getImage(){
            return $this->Image;
        }
        
        
        public function setName($Name){
            $this->Name = $Name;
        }
    }
?>