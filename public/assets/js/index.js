let qValues = document.querySelectorAll('.answ');
let dataValue = document.querySelector('#data');
let formQuiz = document.getElementById('formQuiz');

let btnvalidform = document.getElementById('btnvalidform');


// Boucle ajout evenement lié au clic
for (answer of qValues){
    answer.addEventListener('click', addClick)
};

// Fonction pour recuperer les ID des questions et les envoiyer dans l'input afin de pouvoir les recuperer en php.
 function addClick(e){
     console.log('ok');
    qValues = e.currentTarget;
    qValues = qValues.getAttribute('data-id');
    dataValue.value = qValues;
};



  btnvalidform.addEventListener('click',raclette);

function raclette(){
    console.log(dataValue.value);
    if(dataValue.value == '') {
        // pop-up message at least one answer

      alert("Choisissez une réponse");
    }
    else {
      // execute function
      /* addClick */
      formQuiz.submit();
    }
}
  