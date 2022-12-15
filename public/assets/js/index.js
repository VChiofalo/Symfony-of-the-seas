let qValues = document.querySelectorAll('.answ');
let dataValue = document.querySelector('#data');

// Boucle ajout evenement lié au clic
for (answer of qValues){
    answer.addEventListener('click', addClick)
};

// Fonction pour recuperer les ID des questions et les envoiyer dans l'input afin de pouvoir les recuperer en php.
 function addClick(e){
    qValues = e.currentTarget;
    qValues = qValues.getAttribute('data-id');
    dataValue.value = qValues;
};
