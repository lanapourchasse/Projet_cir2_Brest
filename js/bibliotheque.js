
ajaxRequest('GET', 'php/request.php?type=affplaylist', affichage_playlist)



function openpopup_ajouter()
{

      var popupOverlay = document.querySelector('.popup-overlay-ajouter');
    popupOverlay.style.display = 'flex';

}

function closepopup_ajouter()
{

    
    var popupOverlay = document.querySelector('.popup-overlay-ajouter');
    popupOverlay.style.display = 'none';

    $titre = document.getElementById('nom_nv_playlist').value;
    console.log($titre);

    ajaxRequest('POST' , 'php/request.php', affichage ,'&titre=' + $titre);
    

}





function affichage(response) 
{
    console.log('Je suis la : '+response);   
    var playlistContainer = document.getElementById('list-playlist');// Sélection de l'élément avec l'identifiant 'playlistContainer'

    var playlist = response;
      
          // Créer un nouvel élément .aff_playlist
          var affPlaylistElement = document.createElement('div');
          affPlaylistElement.classList.add('playlist');
      
          // Créer le contenu de l'élément .aff_playlist
          var content_bis =`
          <div class="le_son">
            <a href="album.html?album=${playlist.titre}" >
                <div class="rectangle">  
                  <img src="img/playliste.png" class="rectangle-img ">
                  <p class="rectangle-info">${playlist.titre}</p>
                  <div class = "date">
                  <p class="rectangle-info">${playlist.date}</p>
                  </div>
                  </div>    
              </div>
              </a>
             <button onclick="openpopup()"><img src="img/moins.png" class="rectangle-img moins "></button>         
         `;
        
          // Ajouter le contenu à l'élément .aff_playlist
          affPlaylistElement.innerHTML = content_bis;
      
          // Ajouter l'élément .aff_playlist au conteneur
          playlistContainer.appendChild(affPlaylistElement);



}


function affichage_playlist(response) 
{

  console.log("Je suis dans l'ajax de playlist");
  
        var playlistContainer = document.getElementById('list-playlist');// Sélection de l'élément avec l'identifiant 'playlistContainer'

        // // Supprimer tous les éléments .aff_playlist existants
        // while (playlistContainer.firstChild) {
        //   playlistContainer.removeChild(playlistContainer.firstChild);
        // }
      
        for (var i = 0; i < response.length; i++) {
          var playlist = response[i];
            
          // Créer un nouvel élément .aff_playlist
          var affPlaylistElement = document.createElement('div');
          affPlaylistElement.classList.add('playlist');
      
          // Créer le contenu de l'élément .aff_playlist
          var content_bis =`
          <div class="le_son">
            <a href="album.html?album=${playlist.titre}" >
                <div class="rectangle">  
                  <img src="img/playliste.png" class="rectangle-img ">
                  <p class="rectangle-info">${playlist.titre}</p>
                  <div class = "date">
                  <p class="rectangle-info">${playlist.date}</p>
                  </div>
                  </div>    
              </div>
              </a>
             <button onclick="openpopup()"><img src="img/moins.png" class="rectangle-img moins "></button>         
         `;
        
          // Ajouter le contenu à l'élément .aff_playlist
          affPlaylistElement.innerHTML = content_bis;
      
          // Ajouter l'élément .aff_playlist au conteneur
          playlistContainer.appendChild(affPlaylistElement);
        }


}