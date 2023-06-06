'use strict';

function modifierChamp($id)
{
  var champ = document.getElementById($id);
  var nouveauContenu = champ.value;
  console.log("Nouveau contenu du champ :", nouveauContenu);
  if($id == 'mdp')
  {
    document.getElementById("verification_mdp").style.display='flex';
  }

 }




 function formulaire()
 {
    console.log("Changement info user");

    var data= [];

     data["nom"] = document.getElementById('nom').value;
    console.log(data["nom"]);

    data ["prenom"] = document.getElementById('prenom').value;
    console.log( data ["prenom"]);

    data["date"] = document.getElementById('date').value;
    console.log(data["date"]);

    data["mp"] = document.getElementById('mdp').value;
    console.log(data["mp"]);

    

    ajaxRequest_user('POST', 'php/request.php', modif_user ,data );



 }

 
function ajaxRequest_user(type, url, callback, data )
{
  let xhr;
  console.log("les data " + data["prenom"]);
  // Create XML HTTP request.
  xhr = new XMLHttpRequest();
  if (type == 'GET' && data != null)
    url += '?' + data;
  xhr.open(type, url);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  console.log(xhr.responseText);
  // Add the onload function.
  xhr.onload = () =>
  {
    switch (xhr.status)
    {
      case 200:
      case 201:
        console.log(xhr.responseText);
        callback(JSON.parse(xhr.responseText));
        break;
    }
  };

  // Send XML HTTP request.
 // newdata =
  xhr.send("nom="+data["nom"]+"&prenom="+data["prenom"]+"&ddn="+data["date"]+"&mp="+data["mp"]);
}






 function modif_user(response)
 {


 console.log("Modification effectuer");
 console.log(response);
  


 }

 


ajaxRequest('GET', 'php/request.php?type=gestion-compte', affichage);

function affichage(response) 
{
  console.log(response); 
  document.getElementById('nom').value = response[0]["nom"];
  document.getElementById('prenom').value = response[0]["prenom"];
  document.getElementById('date').value = response[0]["date_naissance"];
  document.getElementById('mdp').value = response[0]["mdp"];
  
  
}
