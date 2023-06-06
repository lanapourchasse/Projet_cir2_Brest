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
  console.log(response);
  var artisteElements = document.querySelectorAll("[id^='" + "artiste" + "']");
  console.log(artisteElements);
  
  for (var i = 0; i < response.length; i++) {
    if (i < artisteElements.length) {
      artisteElements[i].textContent = response[i].nom;
    }
  }
}
function affichage_morceaux(response) {
  console.log(response);
  for (var i = 0; i < response.length; i++) {
    // var index = i * 2;
    var titreElement = document.getElementById('titre_morceau_' + i);
    
    if (titreElement) {
      titreElement.textContent = response[i].titre;
    }
  }
}

function affichage_albums(response) {
  console.log(response);
  for (var i = 0; i < response.length; i++) {
    // var index = i * 2;
    var titreElement = document.getElementById('titre_' + i);
    
    if (titreElement) {
      titreElement.textContent = response[i].titre;
    }
  }
}