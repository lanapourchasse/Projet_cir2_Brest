'use strict';

var selectElement = document.getElementById('type-select');
var searchButton = document.getElementById('search-button');

searchButton.addEventListener('click', function() {
  var selectedValue = selectElement.value;
  
  if (selectedValue == "artiste") {
    window.location.href = "recherche-artiste.html";
  } else if (selectedValue == "album") {
    window.location.href = "album.html";
  } else if (selectedValue == "morceau") {
    window.location.href = "morceaux.html";
  }
});
