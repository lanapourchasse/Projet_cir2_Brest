'use strict';

ajaxRequest('GET', 'php/request.php?type=playlist', affichage);

function affichage(response) {
  var playlistContainer = document.getElementById('playlistContainer');// Sélection de l'élément avec l'identifiant 'playlistContainer'

  // // Supprimer tous les éléments .aff_playlist existants
  // while (playlistContainer.firstChild) {
  //   playlistContainer.removeChild(playlistContainer.firstChild);
  // }

  for (var i = 0; i < response.length; i++) {
    var playlist = response[i];

    // Créer un nouvel élément .aff_playlist
    var affPlaylistElement = document.createElement('div');
    affPlaylistElement.classList.add('aff_playlist');

    // Créer le contenu de l'élément .aff_playlist
    var content_bis = `
      <a href="playlist.html?titre=${playlist.titre}">
        <img class="img_playlist" src="img/1.png">
        <div class="description">
          <p class="nom_playlist">${playlist.titre}</p>
        </div>
      </a>
      </div>`;

    // Ajouter le contenu à l'élément .aff_playlist
    affPlaylistElement.innerHTML = content_bis;

    // Ajouter l'élément .aff_playlist au conteneur
    playlistContainer.appendChild(affPlaylistElement);
  }
}