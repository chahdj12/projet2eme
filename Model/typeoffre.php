<?php
class typeoffre
{
    private ?int $idtype= null;
    private ?string $nomtype= null;
    private ?string $logo= null;
    private ?int $nbroffres = null;
 

    public function __construct($idtype = null, $n, $l, $nb)
    {
        $this->idtype = $idtype;
        $this->nomtype = $n;
        $this->logo = $l;
        $this->nbroffres = $nb;
        
    }


    public function getidtype()
    {
        return $this->idtype;
    }


    public function getnomtype()
    {
        return $this->nomtype;
    }


    public function setnomtype($nomtype)
    {
        $this->nom = $nomtype;

        return $this;
    }


    public function getlogo()
    {
        return $this->logo;
    }


    public function setlogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }


    public function getnbroffres()
    {
        return $this->nbroffres;
    }


    public function setnbroffres($nbroffres)
    {
        $this->nbroffres = $nbroffres;

        return $this;
    }



}
