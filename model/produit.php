<?php
class produit
{
   
    private ?string $name = null;
    private ?string $descriptionP = null;
    private ?int $stock = null;
    private ?int $prix = null;

    public function __construct( $n, $desc, $stock, $prix)
    {
        $this->name = $n;
        $this->description_p = $desc;
        $this->stock = $stock;
        $this->prix = $prix;
    }


  


    public function getname()
    {
        return $this->name;
    }


    public function setname($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getdescription_p()
    {
        return $this->description_p;
    }


    public function setdescription_p($description_p)
    {
        $this->description_p = $description_p;

        return $this;
    }


    public function getstock()
    {
        return $this->stock;
    }


    public function setstock($stock)
    {
        $this->stock = $stock;

        return $this;
    }


    public function getprix()
    {
        return $this->prix;
    }


    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
}