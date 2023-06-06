// Obtenez l'URL de la page actuelle
var currentPage = window.location.href;

// Vérifiez sur quelle page on est
if (currentPage.includes("recherche-artiste.html")) {
  // Effectuez une requête spécifique pour la page recherche-artiste.html
  ajaxRequest('GET', 'php/request.php/?type=artiste', affichage_artistes);

} else if (currentPage.includes("album.html")) {
  // Effectuez une requête spécifique pour la page album.html
  ajaxRequest('GET', 'php/request.php/?type=album',affichage_albums);
} else if (currentPage.includes("morceaux.html")) {
  // Effectuez une requête spécifique pour la page morceaux.html
  ajaxRequest('GET', 'php/request.php/?type=morceau',affichage_morceaux );
}


function affichage_artistes(response) {
  var playlistContainer = document.querySelector('.affichage'); // Sélection de l'élément avec la classe 'historique'
  for (var i = 0; i < response.length; i++) {
       
          var artiste = response[i];
          // Créer un nouvel élément .aff_playlist
          var affPlaylistElement = document.createElement('div');
          affPlaylistElement.classList.add('ligne');
          // Créer le contenu de l'élément .aff_playlist
          var content_bis =` <a href="artiste.html"><p>${artiste.nom}</p></a>
               
            </div>`;
            // Ajouter le contenu à l'élément .aff_playlist
          affPlaylistElement.innerHTML = content_bis;

          // Ajouter l'élément .aff_playlist au conteneur
          playlistContainer.appendChild(affPlaylistElement);
        }
}






function affichage_morceaux(response) {
  console.log(response);
  var playlistContainer = document.querySelector('.orga'); // Sélection de l'élément avec la classe 'historique'
   for (var i = 0; i < response.length; i++) {
       
          var morceaux = response[i];
          var affPlaylistElement = document.createElement('div');
          affPlaylistElement.classList.add('sous_orga');
          // Créer le contenu de l'élément .aff_playlist
          var content_bis =`<a href="morceau.html">
        <div class="playlist">
            <div class="le_son">
                <div class="rectangle">  
                    <img src="img/sound.png" class="rectangle-img ">
                    <p class="rectangle-info"id="titre_morceau_0">${morceaux.titre}</p>

                </div>    
            </div>
        </div>
    </a>`;
    // Ajouter le contenu à l'élément .aff_playlist
          affPlaylistElement.innerHTML = content_bis;

          // Ajouter l'élément .aff_playlist au conteneur
          playlistContainer.appendChild(affPlaylistElement);
        }
}

  




function affichage_albums(response) {
 var playlistContainer = document.querySelector('.mise_en_page'); // Sélection de l'élément avec la classe 'historique'
 for (var i = 0; i < response.length; i++) {
          var album = response[i];

          // Créer un nouvel élément .aff_playlist
          var affPlaylistElement = document.createElement('div');
          affPlaylistElement.classList.add('playlist');

          // Créer le contenu de l'élément .aff_playlist
          var content_bis =`
          <div class="le_son">
            <a href="detail-album.html?titre=${album.Titre}" >
                <div class="rectangle">  
                  <img src="img/sound.png" class="rectangle-img ">
                  <p class="rectangle-info">${album.Titre}</p>
                  <div class = "date">
                  <p class="rectangle-info">${album.Date}</p>
                  </div>
                  </div>    
              </div>
              </a>`;

          // Ajouter le contenu à l'élément .aff_playlist
          affPlaylistElement.innerHTML = content_bis;

          // Ajouter l'élément .aff_playlist au conteneur
          playlistContainer.appendChild(affPlaylistElement);
        }


}