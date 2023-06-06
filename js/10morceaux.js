
'use strict';

ajaxRequest('GET', 'php/request.php?type=dix_morceaux', affichage)

function affichage(response) {
  console.log(response);
  var historiqueContainer = document.querySelector('.historique'); // Sélection de l'élément avec la classe 'historique'

  for (var i = 0; i < response.length; i++) {
    var morceau = response[i];

    // Créer un nouvel élément <a>
    var aElement = document.createElement('a');
    aElement.href = 'morceau.html?titre=' + morceau.titre;

    // Créer le contenu de l'élément <a> avec la classe 'rectangle'
    var content = `
      <div class="rectangle">
        <img class="rectangle-img" src="img/sound.png">
        <p class="rectangle-info" id="artiste_${i}">${morceau.nom}</p>
        <p class="rectangle-info" id="titre_morceau_${i}">${morceau.titre}</p>
      </div>
    `;

    // Insérer le contenu à l'intérieur de l'élément <a>
    aElement.insertAdjacentHTML('beforeend', content);

    // Ajouter l'élément <a> au conteneur
    historiqueContainer.appendChild(aElement);
  }
}