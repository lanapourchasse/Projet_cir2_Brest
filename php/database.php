<?php
require_once('constants.php');



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
    'SELECT * from morceau join artiste using(id)  where titre=:titre';
    

    $prepa  = $db->prepare($request);
    $prepa->bindParam(':titre', $titre);
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

function album($db , $titre)
{

  
  try {
    
    $request = 
    'SELECT * from album where titre=:titre';
    

    $prepa  = $db->prepare($request);
    $prepa->bindParam(':titre', $titre);
    $prepa->execute();

    $album = $prepa->fetchAll(PDO::FETCH_ASSOC);

  }
  catch (PDOException $exception) 
  {
    error_log('Request error: '.$exception->getMessage());
    return false;
  }

  
  return $album;
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

//----------------------------------------------------------------------------
  //--- insert_utilisateur ------------------------------------------------------------
  //----------------------------------------------------------------------------
  // insère un utilisateur.
  function insert_utilisateur($db, $mail, $nom,$prenom,$date_naissance,$mdp)
  {
    try
    {
      
      $request="INSERT INTO utilisateur VALUES(:mail,:nom,:prenom,:date_naissance,:mdp)";
      $statement = $db->prepare($request);
      $statement->bindParam(':mail', $mail);
      $statement->bindParam(':nom', $nom);
      $statement->bindParam(':prenom', $prenom);
      $statement->bindParam(':date_naissance',$date_naissance);
      $statement->bindParam(':mdp', $mdp);
    
      $statement->execute();
      $db->commit();
    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return true;
  }

//  //----------------------------------------------------------------------------
//   //--- verification connexion------------------------------------------------------------
//   //----------------------------------------------------------------------------
//   // insère un utilisateur.

   function connexion($db, $mail,$mdp)
  {
    try
    {
      $request = 'SELECT count(mail) FROM utilisateur WHERE mail=:mail and mdp=:mdp';
      $statement = $db->prepare($request);
      $statement->bindParam(':mail', $mail);
      $statement->bindParam(':mdp', $mdp);      
      $statement->execute();
      $count = $statement->fetchColumn();

      

    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return $count;
  }

//  //----------------------------------------------------------------------------
//   //--- filte ------------------------------------------------------------
//   //----------------------------------------------------------------------------
//   // insère un utilisateur.

  function filtre($db, $table)
  {
    try
  {
    $request = "SELECT * FROM " . $table;
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return $result;
  }
 //----------------------------------------------------------------------------
  //--- filtre ------------------------------------------------------------
  //----------------------------------------------------------------------------
  // insère un utilisateur.

  function dix_morceaux($db)
  {
    try
  {
    $request = "SELECT titre,artiste.nom FROM ecoute_le join morceau using (id_morceau) join utilisateur using(mail) join artiste using(id)  order by  date_ecoute DESC LIMIT 10";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return $result;
  }

  //----------------------------------------------------------------------------
  //--- playlist ------------------------------------------------------------
  //----------------------------------------------------------------------------
  // insère un utilisateur.

  function playlist($db)
  {
    try
  {
    $request = "SELECT titre FROM liste";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return $result;
  }
   //----------------------------------------------------------------------------
  //--- playlist filtrée ------------------------------------------------------------
  //----------------------------------------------------------------------------
  // insère un utilisateur.






  function playlist_filtre($db,$titre)
  {
    try
  {
   $request = "SELECT morceau.titre,duree  FROM fait_parti join morceau using(id_morceau)  where fait_parti.titre=:titre" ;
    $statement = $db->prepare($request);
    $statement->bindParam(':titre', $titre);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return $result;
  }
  //----------------------------------------------------------------------------
  //--- favori ------------------------------------------------------------
  //----------------------------------------------------------------------------
  // insère un utilisateur.

  function favoris($db)
  {
    try
  {
   $request = "SELECT * FROM favori join morceau using(id_morceau) ";
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return $result;
  }














