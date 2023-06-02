<?php


class Artiste
{

    private $nom;

    private $id;


    public function affiche()
    {
        echo "NOM : $this->nom <br> ID: $this->id <br>"; 
    }

    public function return_Nom()
    {
            return $nom;
    }

    public function return_Id()
    {
        return $id;
    }


}