'use strict';

var boutonRecherche = document.getElementById('search-button');

boutonRecherche.addEventListener('click', function() {
  var mailSelectionne = document.getElementById('mail').value;
  var mdpSelectionne = document.getElementById('mp').value;

  ajaxRequest('GET', 'php/request.php?type=connexion&mail=' + mailSelectionne + '&mdp=' + mdpSelectionne, affichage);

  function affichage(reponse) {
    console.log(reponse);
    if (reponse == 1) {
      var mailQueryParam = encodeURIComponent(mailSelectionne);
      window.location.href = 'accueil.html?mail=' + mailQueryParam;
    } else {
      var mauvaiseConnexion = document.getElementById('mauvaise_connexion');
      mauvaiseConnexion.textContent = "Erreur de connexion, veuillez réessayer";
    }
  }
});
