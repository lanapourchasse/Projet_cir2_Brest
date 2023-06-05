function modifierChamp()
{
  var champ = document.getElementById("monChamp");
  var nouveauContenu = champ.value;
  console.log("Nouveau contenu du champ :", nouveauContenu);
 }





 
'use strict';

ajaxRequest('GET', 'php/request.php?type=gestion-compte', affichage)

function affichage(response) 
{
  console.log(response);  

/*
   document.getElementById('myAudio').src = "wave/"+response[0]["lien_musique"];
    
    document.getElementById('titre_morceau').textContent = response[0]["titre"];
    document.getElementById('artiste_morceau').textContent =response[0]["nom"];
    document.getElementById('duree_morceau').textContent =response[0]["duree"];
    document.getElementById('image_morceau').src = "img/"+response[0]["image"];
   
 */  
   
  
}
