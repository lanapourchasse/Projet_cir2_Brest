<?php 


class Utilisateur
{


    private $mail;
    
    private $nom;

    private $prenom;

    private $date_naissance;

    private $mpd;



    public function affiche()
    {
        echo " Mail : $this->mail , Nom :$this->nom , Prenom: $this->prenom , Date N : $this->date_naissance , MPD : $this->mdp";
    }



}