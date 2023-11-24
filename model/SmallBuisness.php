<?php
class SmallBuisness{
           
            private $id;
            private $name;
            private $categorie;
            private $lieu;
            private $description;
            private $id_produit;
            private $logo;
           

    
    function __construct($name,$categ,$lieu,$desc,$id_produit,$logo)
   
    {
        //$this->id = $id;
        $this->name=$name;
        $this->categorie=$categ;
        $this->lieu=$lieu;
        $this->description=$desc;
        $this->id_produit=$id_produit;
        $this->logo=$logo;
       

         }
  
      
       

        function getid()// récupérer la valeur 
        
        {
            return $this->id;
        }

        function setid($id)//définir (ou modifier) 
        {
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
          function getIdProduit(){
            return $this->id_produit;
        }

        function setIdProduit($id_produit){
            $this->id_produit =$id_produit;
        }

        function getlogo(){
            return $this->logo;
        }

        function setlogo($logo){
            $this->logo =$logo;
        }

              
}


?>