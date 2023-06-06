'use strict';
var boutonRecherche = document.getElementById('search-button');
boutonRecherche.addEventListener('click', function() {
  var mailSelectionne = document.getElementById('mail').value;
  var nomSelectionne = document.getElementById('nom').value;
  var prenomSelectionne = document.getElementById('prenom').value;
  var date_naissanceSelectionne = document.getElementById('date_naissance').value;
  var mdpSelectionne = document.getElementById('mdp').value;
  var mdp2Selectionne = document.getElementById('mdp2').value;

  

  ajaxRequest('POST', 'php/request.php?type=inscription',());
;
