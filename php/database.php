<?php
require_once('constants.php');
require_once('artiste.php');
require_once('morceau.php');
require_once('album.php');
require_once('utilisateur.php');


//----------------------------------------------------------------------------
//--- Connection --------------------------------------------------------------
//----------------------------------------------------------------------------
// crée la connexion avec la base de donnée.
function dbConnect()
{
  try
  {
    $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8',DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  }
  catch (PDOException $exception)
  {
    error_log('Connection error: '.$exception->getMessage());
    return false;
  }
  return $db;
}





function artiste($db)
{

  
  try {
    
    $request = 'SELECT a.nom ,alb.image , alb.style FROM album  alb JOIN artiste a ON alb.id=a.id';
    

    $prepa  = $db->prepare($request);
    $prepa->execute();

    $artiste = $prepa->fetchAll(PDO::FETCH_ASSOC);

  }
  catch (PDOException $exception) 
  {
    error_log('Request error: '.$exception->getMessage());
    return false;
  }

  
  return $artiste;






}





function morceau($db , $titre)
{

  
  try {
    
    $request = 
    'SELECT a.nom , m.titre , m.duree , m.lien_musique , alb.image
     FROM morceau m
     JOIN artiste a ON  m.id_artiste = a.id 
     JOIN album alb ON m.titre_album = alb.titre
     WHERE m.titre = '.$titre;
    

    $prepa  = $db->prepare($request);
    $prepa->execute();

    $morceau = $prepa->fetchAll(PDO::FETCH_ASSOC);

  }
  catch (PDOException $exception) 
  {
    error_log('Request error: '.$exception->getMessage());
    return false;
  }

  
  return $morceau;
}



function gestion_compte($db)
{

  try {
    
    $request = 'SELECT a.nom ,alb.image , alb.style FROM album  alb JOIN artiste a ON alb.id=a.id';
    

    $prepa  = $db->prepare($request);
    $prepa->execute();

    $user = $prepa->fetchAll(PDO::FETCH_ASSOC);

  }
  catch (PDOException $exception) 
  {
    error_log('Request error: '.$exception->getMessage());
    return false;
  }

  
  return $user;






}











/*

function info_morceau($db)
{

  $request = 'SELECT m.id , m.titre ,m.duree , m.lien_musique , Titre_album , a.nom FROM morceau m JOIN artiste a ON m.id_Artiste = a.id ';
  $prepa = $db->prepare($request);
  $prepa->execute();


  $morceaux = $prepa->fetchAll(PDO::FETCH_CLASS, 'Morceau');

  foreach($morceaux  as $tmp)
  {
       $tmp->affiche();
  }



}


function info_album($db)
{
  $request = 'SELECT a.titre , a.date , a.image , a.style FROM album a';
  $prepa = $db->prepare($request);
  $prepa->execute();

  $album = $prepa->fetchAll(PDO::FETCH_CLASS, 'Album');

  foreach($album as $tmp)
  {
       $tmp->affiche();
  }




}



function info_utilisateur($db)
{
  $request = 'SELECT mail , nom , prenom , date_naissance , mdp FROM utilisateur';
  $prepa = $db->prepare($request);
  $prepa->execute();

  $user = $prepa->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');

  foreach($user as $tmp)
  {

       $tmp->affiche();
       
  }



}
*/


