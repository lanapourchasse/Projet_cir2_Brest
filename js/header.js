'use strict';

var searchButton = document.getElementById('search-button');
searchButton.addEventListener('click', function() {
  var selectElement = document.getElementById('type-select');
  var selectedValue = selectElement.value;
  console.log(selectedValue);

  ajaxRequest('GET', 'php/request.php/?type=' + selectedValue, function(response) {
    affichage(response, selectedValue);
  });
});

function affichage(response, selectedValue) {
  console.log(response);
  
  if (selectedValue == "artiste") {
    // Rediriger vers une page spécifique pour les artistes avec les résultats de la requête
    window.location.href = "recherche-artiste.html?data=" + encodeURIComponent(JSON.stringify(response));
  } else if (selectedValue == "album") {
    // Rediriger vers une page spécifique pour les albums avec les résultats de la requête
    window.location.href = "album.html?data=" + encodeURIComponent(JSON.stringify(response));
  } else if (selectedValue == "morceau") {
    // Rediriger vers une page spécifique pour les morceaux avec les résultats de la requête
    window.location.href = "morceaux.html?data=" + encodeURIComponent(JSON.stringify(response));
  }
}
