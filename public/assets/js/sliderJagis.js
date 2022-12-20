//SLIDER A MODIFIER AVE LES CLASSES (REPRIS DE LA PAGE JE M'INFORME)
document.addEventListener('DOMContentLoaded', (e) => {

    let btnPrev = document.querySelector('.btn-prev');
    let btnNext = document.querySelector('.btn-next');
    let delta = 0;
    let counter = 0;
    let step = 340;
    let slider = document.querySelector('.articles');
    let containerWidth = document.querySelector('.articles-ateliers-container').offsetWidth;
    let nbSlide = slider.children.length;
    let divid = Math.round(containerWidth / step);


    if (!btnPrev || !btnNext) return;

    btnPrev.addEventListener('click', (e) => {
        if (counter > 0) {
            delta = delta + step;
            slider.style.transform = `translate(${delta}px, 0)`;
            counter--;
        }
    });

    btnNext.addEventListener('click', (e) => {
        if (counter < (nbSlide - (divid - 2))) {
            delta = delta - step;
            slider.style.transform = `translate(${delta}px, 0)`;
            counter++;
        }
    });

})