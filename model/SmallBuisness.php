<?php
class SmallBuisness{
           
            private $id;
            private $name;
            private $categorie;
            private $lieu;
            private $description;
            private $logo;
           

    
    function __construct($name,$categorie,$lieu,$description,$logo){
        
        $this->name=$name;
        $this->categorie=$categorie;
        $this->lieu=$lieu;
        $this->description=$description;
        $this->logo=$logo;
       

         }
  
      
       

        function getid(){
            return $this->id;
        }

        function setid($id){
            $this->id =$id;
        }
        function getname(){
            return $this->name;
        }

        function setcategorie($categorie){
            $this->categorie =$categorie;
        }


        function getcategorie(){
            return $this->categorie;
        }

        function setname($name){
            $this->name =$name;
        }
        function getlieu(){
            return $this->lieu;
        }

        function setlieu($lieu){
            $this->lieu =$lieu;
        }

          function getdescription(){
            return $this->description;
        }

        function setdescription($description){
            $this->description =$description;
        }

        function getlogo(){
            return $this->logo;
        }

        function setlogo($logo){
            $this->logo =$logo;
        }

              
}


?>