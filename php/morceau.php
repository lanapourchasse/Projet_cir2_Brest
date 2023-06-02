<?php
require_once('artiste.php');


class Morceau
{
    private $titre;

    private $duree;

    private $lien;

    private $artiste;

    private $album;

    public function affiche()
    {

        echo"Titre : $this->titre ,  Durée : $this->duree ,  Lien : $this->lien , Artiste : $this->artiste , Album : $this->album";

    }




}