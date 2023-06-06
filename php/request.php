<?php

require_once('database.php');


$db = dbConnect();
  if (!$db)
  {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
  }





$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = isset($_GET['type']) ? $_GET['type'] : '';



parse_str(file_get_contents("php://input"), $_PUT);



 

 if ($requestMethod == 'GET') 
 {


  if ($request == 'artiste')
   {
      if (!empty($request)) 
      {
          $data = artiste($db);
      }
  
    }
    else if ($request == 'morceau')
   {
      if (!empty($request)) 
      {
          $data = morceau($db);
      }
  
    }
    else if ($request == 'gestion-compte')
   {
      if (!empty($request)) 
      {        
          $data = gestion_compte($db);
      }
  
    }

    else if ($request == 'dix_morceaux')
     {
      if (!empty($request)) {
        $data = dix_morceaux($db);
      } else {
        // La clé "type" n'est pas définie dans $_GET
        // Gérez cette situation en conséquence
        $data = "vide"; // ou tout autre valeur par défaut que vous souhaitez définir
      }
    }
    else if ($request == 'playlist') 
    { 
  
      if (!empty($request)) {
        $data = playlist($db);
      } else {
        // La clé "type" n'est pas définie dans $_GET
        // Gérez cette situation en conséquence
        $data = "vide"; // ou tout autre valeur par défaut que vous souhaitez définir
      }
    
  }
  else if ($request == 'affplaylist') 
    {

        $data = affichage_playlist($db);
      } else {
        // La clé "type" n'est pas définie dans $_GET
        // Gérez cette situation en conséquence
        $data = "vide"; // ou tout autre valeur par défaut que vous souhaitez définir
      }
    }
    else{
       if (!empty($request)) {
       $type = $_GET['type'];
      $data = filtre($db, $type);
    } else {
      // La clé "type" n'est pas définie dans $_GET
      // Gérez cette situation en conséquence
      $data = "vide"; // ou tout autre valeur par défaut que vous souhaitez définir
      }
    }




  if ($requestMethod == 'POST' )
      {
       // var_dump($_POST['nom'] , $_POST['prenom'] , $_POST['ddn'] );
        
        if( isset( ($_POST['titre']) ) )
            $data =creation_playlist($db,  strip_tags($_POST['titre']));


        if( isset( ($_POST['id']) ) )
            $data =ajout_fav($db,  strip_tags($_POST['id']));


/*
        if(isset( $_POST['nom'] ))
            $data =modifier_user($db, $_POST['nom'] , $_POST["prenom"] ,  $_POST['ddn'] , $_POST["mp"] );  

*/

      }

     
        


  header('Content-Type: application/json; charset=utf-8');
  header('Cache-control: no-store, no-cache, must-revalidate');
  header('Pragma: no-cache');
  header('HTTP/1.1 200 OK');
  echo json_encode($data);
  exit;
  ?>