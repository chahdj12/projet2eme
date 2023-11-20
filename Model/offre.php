<?php
class offre
{
    private ?int $idoffre= null;
    private ?string $descoffre= null;
    private ?string $localoffre= null;
    private ?int $typeoffre = null;
 

    public function __construct($idoffre = null, $dsc, $lc, $idtype)
    {
        $this->idoffre= $idoffre;
        $this->descoffre= $dsc;
        $this->localoffre = $lc;
        $this->typeoffre = $idtype;
        
    }


    public function getidoffre()
    {
        return $this->idoffre;
    }


    public function getdescoffre()
    {
        return $this->descoffre;
    }


    public function setdescoffre($descoffre)
    {
        $this->descoffre = $descoffre;

        return $this;
    }


    public function getlocaloffre()
    {
        return $this->localoffre;
    }


    public function setlocaloffre($localoffre)
    {
        $this->localoffre = $localoffre;

        return $this;
    }


    public function gettypeoffre()
    {
        return $this->typeoffre;
    }


    public function settypeoffre($typeoffre)
    {
        $this->typeoffre= $typeoffre;

        return $this;
    }



}
