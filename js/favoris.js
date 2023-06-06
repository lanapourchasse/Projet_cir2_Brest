'use strict';
const { searchParams } = new URL(window.location.href);
const titre = searchParams.get('titre');
console.log(titre);

ajaxRequest('GET','php/request.php?type=favoris_page', affichage);


function affichage(response) 
{

  
    var playlistContainer = document.querySelector('.mise_en_page'); // Sélection de l'élément avec la classe 'historique'
        

        for (var i = 0; i < response.length; i++) {
          var favoris = response[i];

          // Créer un nouvel élément .aff_playlist
          var affPlaylistElement = document.createElement('div');
          affPlaylistElement.classList.add('playlist');

          // Créer le contenu de l'élément .aff_playlist
          var content_bis =`
          <div class="le_son">
            <a href="morceau.html?titre=${favoris.titre}" >
                <div class="rectangle">  
                  <img src="img/sound.png" class="rectangle-img ">
                  <p class="rectangle-info">${favoris.titre}</p>
                  <div class = "date">
                  
                  </div>
                  </div>    
              </div>
              </a>
             <button onclick="openpopup()"><img src="img/full_heart.png" class="heart "></button>`;

          // Ajouter le contenu à l'élément .aff_playlist
          affPlaylistElement.innerHTML = content_bis;

          // Ajouter l'élément .aff_playlist au conteneur
          playlistContainer.appendChild(affPlaylistElement);
        }


}
