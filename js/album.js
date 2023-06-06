'use strict';
 var urlParams = new URLSearchParams(window.location.search);
  var titre = urlParams.get('titre');
  console.log(titre);
  ajaxRequest('GET', 'php/request.php?type=detail_album&titre=' + titre, affichage);

  function affichage(response) 
{
	console.log(response);
	 var playlistContainer = document.querySelector('.playlist'); // Sélection de l'élément avec la classe 'historique'
	   for (var i = 0; i < response.length; i++) {
          var album = response[i];
          // Créer un nouvel élément .aff_playlist
          var affPlaylistElement = document.createElement('div');
          affPlaylistElement.classList.add('le_son');

          var content_bis =`   <a href="morceau.html" >
                    <div class="rectangle">  
                        <img src="img/sound.png" class="rectangle-img ">
                        <p class="rectangle-info">${album.Titre}</p>
                        <p class="rectangle-info">${album.Date}</p>
                        <img src="img/play.png" class="rectangle-img ">
                        
                    </div>  
                    </a>  
                </div>`;
               // Ajouter le contenu à l'élément .aff_playlist
          affPlaylistElement.innerHTML = content_bis;

          // Ajouter l'élément .aff_playlist au conteneur
          playlistContainer.appendChild(affPlaylistElement);
        }


}
