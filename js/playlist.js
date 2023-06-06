'use strict';

ajaxRequest('GET', 'php/request.php?type=playlist', affichage)

function affichage(response) {
  var artistes = document.querySelectorAll('.nom_playlist');

  for (var i = 0; i < artistes.length && i < response.length; i++) {
    artistes[i].textContent = response[i].titre;
  }
}