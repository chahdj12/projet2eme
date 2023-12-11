<?php

class Blog {
    private $id = null;
    private $title = null;
    private $mail = null;
    private $date = null;
    private $contenue = null;

    function __construct($title, $mail, $date, $contenue){
        $this->title = $title;
        $this->mail = $mail;
        $this->date = $date;
        $this->contenue = $contenue;
    }

    
    public function getTitle(){
        return $this->title;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getDate(){
        return $this->date;
    }
    public function getContenue(){
        return $this->contenue;
    }
    public function getID(){
        return $this->id;
    }
}
