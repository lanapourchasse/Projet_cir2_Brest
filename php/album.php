<?php



class Album
{
    private $titre;
    private $Date;
    private $image;
    private $style;

    public function affiche()
    {
        echo"Titre : $this->titre , Date : $this->Date , Image : $this->image , Style: $this->style <br>";
    }





}


