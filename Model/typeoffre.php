<?php

class typeoffre{
    private string $idType=null;
    private string $nomType=null;
    private string $Logo=null;
    private string $nbrOffres=null;


    public function __construct($idType=null,$n,$l,$nb) //id=null car id auto incremente
    {
        $this->idType=$idType;
        $this->nomType=$n;
        $this->Logo=$l;
        $this->nbrOffres=$nb;
    

    }
    public function getidType()
    {
        return $this->idType;

    }
    public function getnomType()
    {
        return $this->nomType;

    }
    public function setnomType($n)
    {
         $this->nomType=$n;

    }
    public function setLogo($l)
    {
         $this->Logo=$l;

    }
    public function getLogo()
    {
        return $this->Logo;

    }
    public function setnbrOffres($nb)
    {
         $this->setnbrOffres=$nb;

    }
    public function getnbrOffres()
    {
        return $this->nbrOffres;

    }
 




}
?>