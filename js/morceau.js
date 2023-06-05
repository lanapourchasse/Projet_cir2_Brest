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

    var popupOverlay = document.querySelector('.popup-overlay-ajouter');
    popupOverlay.style.display = 'flex';

}



function closepopup_ajouter()
{
    var popupOverlay = document.querySelector('.popup-overlay-ajouter');
    popupOverlay.style.display = 'none';

}






'use strict';

ajaxRequest('GET', 'php/request.php?type=morceau', affichage)

function affichage(response) 
{
  console.log(response);  

   document.getElementById('myAudio').src = "wave/"+response[0]["lien_musique"];
    
    document.getElementById('titre_morceau').textContent = response[0]["titre"];
    document.getElementById('artiste_morceau').textContent =response[0]["nom"];
    document.getElementById('duree_morceau').textContent =response[0]["duree"];
    document.getElementById('image_morceau').src = "img/"+response[0]["image"];
   
   
   
  
}

