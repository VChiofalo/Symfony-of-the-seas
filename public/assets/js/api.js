let qValues = document.querySelectorAll('.contact');
let dataValue = document.querySelector('#contact');

// Boucle ajout evenement lié au clic
for (answer of qValues){
    answer.addEventListener('click', addClick)
};

// Fonction pour recuperer les ID des questions et les envoyer dans l'imput afin de pouvoir les recuperer en php.
function addClick(e){
    qValues = e.currentTarget;
    qValues = qValues.getAttribute('contact');
    dataValue.value = qValues;
    console.log(dataValue.value);
};

