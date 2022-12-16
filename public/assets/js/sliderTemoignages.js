document.addEventListener('DOMContentLoaded', (e) => {

    let btnPrev = document.querySelector('#temoignages-container .btn-prev');
    let btnNext = document.querySelector('#temoignages-container .btn-next');
    let delta = 0;
    let counter = 0;
    let step = 250;
    let slider = document.querySelector('#temoignages');
    let containerWidth = document.getElementById('temoignages-container').offsetWidth;
    let nbSlide= slider.children.length;

    let divid = Math.round(containerWidth  / step);
    console.log(divid);
    
    if (!btnPrev || !btnNext) return;
    

    let tailleMaDiv = document.getElementById('temoignages-container').style.height /* = tailleMaDiv+"px" */;
    console.log(tailleMaDiv); 

    btnPrev.addEventListener('click', (e) => {
        console.log(counter);
        if(counter < (nbSlide - (divid - 2))) {
            delta = delta - step;
            slider.style.transform = `translate(${delta}px,0)`;
            /*if (delta < 2500) {
                delta = -700;
            };    */     
            console.log(delta);
            counter++;
        }

       /*  if (btnleft < cardTemoign) {
            btnleft = cardTemoign;            
        } */
       /*  console.log(btnLeft); */

    });
    
    btnNext.addEventListener('click', (e) => {
        if(counter > 0) {
            delta = delta + step;
            slider.style.transform = `translate(${delta}px, 0)`;
            
        
            console.log(delta);
            counter--;
        }
    });
    
})
let tailleMaDiv =  document.getElementById('temoignages-container').offfserHeight;




