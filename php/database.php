<?php
require_once('constants.php');
// require_once('artiste.php');



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





// function info_artiste($db)
// {

  
//     $request = 'SELECT * FROM artiste';

//     $prepa  = $db->prepare($request);
//     $prepa->execute();

//     $artiste = $prepa->fetchAll(PDO::FETCH_CLASS,'Artiste');

//     foreach($artiste  as $tmp)
//     {
//          $tmp->affiche();
//     }
// }

// function info_morceau($db)
// {

//   $request = 'SELECT m.id , m.titre ,m.duree , m.lien_musique , Titre_album , m.id_Artiste , a.id , a.nom FROM morceau m JOIN artiste a ON m.id_Artiste = a.id ';
//   $prepa = $db->prepare($request);
//   $prepa->execute();


//   $morceaux = $prepa->fetchAll(PDO::FETCH_CLASS, 'Morceau');

//   foreach($morceau  as $tmp)
//   {
//        $tmp->affiche();
//   }
// }
// //----------------------------------------------------------------------------
//   //--- insert_utilisateur ------------------------------------------------------------
//   //----------------------------------------------------------------------------
//   // insère un utilisateur.
//   function insert_utilisateur($db, $mail, $nom,$prenom,$date_naissance,$mdp)
//   {
//     try
//     {
      
//       $request="INSERT INTO utilisateur VALUES(:mail,:nom,:prenom,:date_naissance,:mdp)";
//       $statement = $db->prepare($request);
//       $statement->bindParam(':mail', $mail);
//       $statement->bindParam(':nom', $nom);
//       $statement->bindParam(':prenom', $prenom);
//       $statement->bindParam(':date_naissance',$date_naissance);
//       $statement->bindParam(':mdp', $mdp);
    
//       $statement->execute();
//       $db->commit();
//     }
//     catch (PDOException $exception)
//     {
//       error_log('Request error: '.$exception->getMessage());
//       return false;
//     }
//     return true;
//   }

//  //----------------------------------------------------------------------------
//   //--- verification connexion------------------------------------------------------------
//   //----------------------------------------------------------------------------
//   // insère un utilisateur.

//    function connexion($db, $mail,$mdp)
//   {
//     try
//     {
//       $request = 'SELECT count(mail) FROM utilisateur WHERE mail=:mail and mdp=:mdp';
//       $statement = $db->prepare($request);
//       $statement->bindParam(':mail', $mail);
//       $statement->bindParam(':mdp', $mdp);      
//       $statement->execute();
//       $count = $statement->fetchColumn();

      

//     }
//     catch (PDOException $exception)
//     {
//       error_log('Request error: '.$exception->getMessage());
//       return false;
//     }
//     return $count;
//   }

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
    $request = "SELECT titre FROM ecoute_le join morceau using (id) join utilisateur using(mail) order by  date_ecoute DESC LIMIT 10";
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





