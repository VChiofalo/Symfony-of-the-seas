document.addEventListener('DOMContentLoaded', (e) => {

    let btnPrev = document.querySelector('.btn-prev');
    let btnNext = document.querySelector('.btn-next');
    let delta = 0;
    let counter = 0;
    // permet de deplacer de 250px
    let step = 250;
    let slider = document.querySelector('#temoignages');
    let containerWidth = document.getElementById('temoignages-container').offsetWidth;
    let nbSlide = slider.children.length;
    let divid = Math.round(containerWidth / step);


    if (!btnPrev || !btnNext) return;
//ajout de l'evenement click + defilement vers la gauche de 250px
    btnPrev.addEventListener('click', (e) => {
        if (counter > 0) {
            delta = delta + step;
            slider.style.transform = `translate(${delta}px, 0)`;
            counter--;
        }
    });
//Defilement vers la droite + blocage des cards a 2 temoignages sur le slider
    btnNext.addEventListener('click', (e) => {
        if (counter < (nbSlide - (divid - 2))) {
            delta = delta - step;
            slider.style.transform = `translate(${delta}px,0)`;
            counter++;
        }
    });

})





