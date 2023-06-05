<?php

require_once('database.php');


$db = dbConnect();
  if (!$db)
  {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
  }

/*
info_artiste($db);
echo '<br> Morceau <br>';
info_morceau($db);
echo '<br> Album <br>';
info_album($db);
echo '<br> Utilisateur <br>';
info_utilisateur($db);

*/

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = isset($_GET['type']) ? $_GET['type'] : '';

//echo $requestMethod;

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
    else
    {
      $data = "vide";
    }






  }



  header('Content-Type: application/json; charset=utf-8');
  header('Cache-control: no-store, no-cache, must-revalidate');
  header('Pragma: no-cache');
  header('HTTP/1.1 200 OK');
  echo json_encode($data);
  exit;
  ?>