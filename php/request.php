<?php
require_once('database.php');

  // Database connexion.
  $db = dbConnect();
  if (!$db)
  {
    header ('HTTP/1.1 503 Service Unavailable');
    exit;
  }

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = isset($_GET['type']) ? $_GET['type'] : '';


 if ($requestMethod == 'GET') 
 {
  if ($request == 'artiste')
  {

    $data = artiste($db);
  
  }

  else if ($request == 'titre_morceau')
  {
    $titre = $_GET['titre'];
    $data = morceau($db,$titre);
  }
    
  else if ($request == 'gestion-compte')
  {

    $data = gestion_compte($db);
  }
  
  else if ($request == 'dix_morceaux') 
  {
    
    $data = dix_morceaux($db);

  }
  else if ($request == 'playlist') 
  { 
    $data = playlist($db);
  }

  else if ($request=='titre')
  {
  $titre = $_GET['titre'];
  $data=playlist_filtre($db,$titre);
  }
   else if ($request=='favoris')
  {
  $data=favoris($db);
  }
  else if ($request=='connexion'){
    $mail = $_GET['mail'];
    $mdp = $_GET['mdp'];
    $data=connexion($db,$mail,$mdp);
  }
   else if ($request=='favoris_page'){
    $data=favoris($db);

}
else if ($request=='detail_album'){
  $titre= $_GET['titre'];
  $data=album($db,$titre);

}

  else
  {
    $type = $_GET['type'];
    $data = filtre($db, $type);
    
  }
}



//Send data to the client.
  header('Content-Type: application/json; charset=utf-8');
  header('Cache-control: no-store, no-cache, must-revalidate');
  header('Pragma: no-cache');
  header('HTTP/1.1 200 OK');
  echo json_encode($data);
  exit;
  ?>
