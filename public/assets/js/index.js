let qValues = document.querySelectorAll('.answ');
let dataValue = document.querySelector('#data');
let formQuiz = document.getElementById('formQuiz');

let btnvalidform = document.getElementById('btnvalidform');


// Boucle ajout evenement lié au clic
for (answer of qValues){
    answer.addEventListener('click', addClick)
};


// Fonction qui change la couleur du background sur la réponse sélectionnée
function changeColor(dataValue) {
  console.log(dataValue.value);
  let answers = document.querySelectorAll('.answ');
  
  answers.forEach(answer => {
    {
      value = answer.getAttribute("data-id");
      if (dataValue.value === value)
      {
        let color = "background-color: #FF8EBF";
        answer.setAttribute('style', color);
      }
      else{
        let color = "background-color: #FFFFFF";
        answer.setAttribute('style', color);
      }
      } 
  })
  // dataValue.setAttribute('background-color', '#FFFFFF');
};

// Fonction pour recuperer les ID des questions et les envoiyer dans l'input afin de pouvoir les recuperer en php.
 function addClick(e){
    console.log('HELLO');
    qValues = e.currentTarget;
    qValues = qValues.getAttribute('data-id');
    dataValue.value = qValues;
    changeColor(dataValue)
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
  