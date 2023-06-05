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

 if ($requestMethod == 'GET') {
  if ($request == 'dix_morceaux') {
    if (!empty($request)) {
      $data = dix_morceaux($db);
    } else {
      // La clé "type" n'est pas définie dans $_GET
      // Gérez cette situation en conséquence
      $data = "vide"; // ou tout autre valeur par défaut que vous souhaitez définir
    }
  }
  else if ($request == 'playlist') { 

    if (!empty($request)) {
      $data = playlist($db);
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
}



//Send data to the client.
  header('Content-Type: application/json; charset=utf-8');
  header('Cache-control: no-store, no-cache, must-revalidate');
  header('Pragma: no-cache');
  header('HTTP/1.1 200 OK');
  echo json_encode($data);
  exit;
  ?>
<!-- info_artiste($db);
info_morceau($db); -->