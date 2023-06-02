<?php
require_once('constants.php');
require_once('artiste.php');



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





function info_artiste($db)
{

  
    $request = 'SELECT * FROM artiste';

    $prepa  = $db->prepare($request);
    $prepa->execute();

    $artiste = $prepa->fetchAll(PDO::FETCH_CLASS,'Artiste');

    foreach($artiste  as $tmp)
    {
         $tmp->affiche();
    }





}


function info_morceau($db)
{

  $request = 'SELECT m.id , m.titre ,m.duree , m.lien_musique , Titre_album , m.id_Artiste , a.id , a.nom FROM morceau m JOIN artiste a ON m.id_Artiste = a.id ';
  $prepa = $db->prepare($request);
  $prepa->execute();


  $morceaux = $prepa->fetchAll(PDO::FETCH_CLASS, 'Morceau');

  foreach($morceau  as $tmp)
  {
       $tmp->affiche();
  }



}





