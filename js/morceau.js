function openpopup_play()
{
    var popupOverlay = document.querySelector('.popup-overlay_play');
    popupOverlay.style.display = 'flex';
    var audio = document.getElementById("myAudio");
    audio.play();

}

function closepopup_play()
{

    
    var popupOverlay = document.querySelector('.popup-overlay_play');
    popupOverlay.style.display = 'none';
    var audio = document.getElementById("myAudio");
    audio.pause();

   
}



function openpopup_ajouter()
{
    console.log("JS du pop up ");
    var popupOverlay = document.querySelector('.popup-overlay-ajouter');
    popupOverlay.style.display = 'flex';

    ajaxRequest('GET', 'php/request.php?type=affplaylist', affichage_playlist)

}

/*
function ajouter()
{
    $titre = document.getElementById('nom_nv_playlist').value;
    console.log($titre);

    ajaxRequest('POST' , 'php/request.php', ajout_playlist ,'&id=' + $titre);
    closepopup_ajouter();
}
*/


function closepopup_ajouter()
{
    var popupOverlay = document.querySelector('.popup-overlay-ajouter');
    popupOverlay.style.display = 'none';


}






'use strict';

ajaxRequest('GET', 'php/request.php?type=morceau', affichage);

function affichage(response) 
{
  console.log(response);  

   document.getElementById('myAudio').src = "wave/"+response[0]["lien_musique"];
    
    document.getElementById('titre_morceau').textContent = response[0]["titre"];
    document.getElementById('artiste_morceau').textContent =response[0]["nom"];
    document.getElementById('duree_morceau').textContent =response[0]["duree"];
    document.getElementById('image_morceau').src = "img/"+response[0]["image"];
   
   
   
  
}

/*
function ajout_playlist()
{
    console.log("La musique a été ajouter ")

}

*/

function affichage_playlist(response) 
{

  console.log("Je suis dans l'ajax de playlist");
  
        var playlistContainer = document.getElementById('list-playlist');// Sélection de l'élément avec l'identifiant 'playlistContainer'

       // // Supprimer tous les éléments .aff_playlist existants
     while (playlistContainer.firstChild) 
     {
           playlistContainer.removeChild(playlistContainer.firstChild);
        }


        for (var i = 0; i < response.length; i++) 
        {
          var playlist = response[i];
            
          // Créer un nouvel élément .aff_playlist
          var affPlaylistElement = document.createElement('div');
          affPlaylistElement.classList.add('le_son');
      
          // Créer le contenu de l'élément .aff_playlist
          var content_bis =
          `
                <a href="playlist.html?titre=${playlist.titre} onclick="ajouter()" >
                    <div class="rectangle">  
                        <img src="img/playliste.png" class="rectangle-img ">
                        <p class="rectangle-info">${playlist.titre}</p>
                    </div>  
                </a>  
            </div>        
         `;
        
          // Ajouter le contenu à l'élément .aff_playlist
          affPlaylistElement.innerHTML = content_bis;
      
          // Ajouter l'élément .aff_playlist au conteneur
          playlistContainer.appendChild(affPlaylistElement);
        }


}