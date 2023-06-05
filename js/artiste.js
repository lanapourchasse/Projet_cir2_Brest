'use strict';

ajaxRequest('GET', 'php/request.php?type=artiste', affichage)

function affichage(response) 
{
  console.log(response);  
    document.getElementById('Nom_artiste').textContent = response[0]["nom"];
    document.getElementById('Genre_musical').textContent =response[0]["style"];


    for (var i = 0; i < response.length; i++)
     {
        document.getElementById('album_'+i).src = "img/"+response[i]["image"];
    
    }
   

  
}