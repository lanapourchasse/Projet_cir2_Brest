<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
  include 'class/' . $class . '.class.php';
});

$db = new Database('projet_54', 'carla_lana', 'carla_lana', 'localhost');

?>

<html>
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Inscription</title>
      <link href="styles/inscription.css" rel="stylesheet" type="text/css">
      
   </head>
 <body>

<header>
         <img id="logo" alt="logo" src="image/logo.png"  />
         <input type="image" id="filtre" alt="filtre" src="image/filtre.svg">
         <input class="champ" id="recherche" type="search"  placeholder= "recherche" />
         <input type="image" id="loupe" alt="loupe" src="image/loupe.svg">
         <input type="image" id="livre" alt="livre" src="image/livre.svg">
         <input type="image" id="maison" alt="maison" src="image/maison.svg"
                   
</header>
<main id="body">

   <div class="contenu">
    <form action="action_inscription.php" method="post">
<p>Votre adresse mail : <input type="text" name="mail" /></p>
 <p>Votre nom: <input type="text" name="nom" /></p>
 <p>Votre prenom : <input type="text" name="prenom" /></p>
 <p>Votre date_naissance : <input type="text" name="date_naissance" /></p>
 <p>Votre mot de passe : <input type="text" name="mdp" /></p>
 <p>Confirmer le mot de passe : <input type="text" name="mdp2" /></p>
 

 <p><input type="submit" value="Valider"></p>
</form>
</main>
 </div>

</body>




</html>