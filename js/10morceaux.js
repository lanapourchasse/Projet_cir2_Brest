'use strict';

ajaxRequest('GET', 'php/request.php?type=dix_morceaux', affichage)

function affichage(response) {
  console.log(response);
  
  for (var i = 0; i < response.length; i++) {
    // var index = i * 2;
    var titreElement = document.getElementById('titre_morceau_' + i);
    
    if (titreElement) {
      titreElement.textContent = response[i].titre;
    }
  }
}