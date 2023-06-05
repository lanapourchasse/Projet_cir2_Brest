<?php
require_once('artiste.php');


class Morceau
{
    private $titre;

    private $duree;

    private $lien_musique;

    private $Titre_album;

    private $id;

    private $nom;



    public function affiche()
    {

        echo"Titre : $this->titre ,  Durée : $this->duree ,  Lien : $this->lien_musique , Artiste : $this->nom;, Album : $this->Titre_album";

    }




}