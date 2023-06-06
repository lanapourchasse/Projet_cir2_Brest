'use strict';

ajaxRequest('GET', 'php/request.php?type=favoris', affichage);

function affichage(response) {
  var playlistContainer = document.getElementById('favorisContainer');// Sélection de l'élément avec l'identifiant 'playlistContainer'
  console.log(response);

  for (var i = 0; i < response.length; i++) {
    var favoris = response[i];

    // Créer un nouvel élément .aff_playlist
    var affPlaylistElement = document.createElement('div');
    affPlaylistElement.classList.add('aff_playlist');

    // Créer le contenu de l'élément .aff_playlist
    var content_bis = `
       <a href="morceau.html?titre=${favoris.titre}">
        <img  class ="img_playlist" src="img/2.png"  >
        <div class = "description">
          <p class = "artiste_playlist"> </p>
          <p class="nom_playlist">${favoris.titre}</p>
        </div>
      </a>`;

    // Ajouter le contenu à l'élément .aff_playlist
    affPlaylistElement.innerHTML = content_bis;

    // Ajouter l'élément .aff_playlist au conteneur
    playlistContainer.appendChild(affPlaylistElement);
  }
}