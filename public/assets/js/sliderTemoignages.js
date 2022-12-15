document.addEventListener('DOMContentLoaded', (e) => {

    let btnPrev = document.querySelector('#temoignages-container .btn-prev');
    let btnNext = document.querySelector('#temoignages-container .btn-next');
    let delta = 0;
    let step = 250;
    let slider = document.querySelector('#temoignages');
    
    if (!btnPrev || !btnNext) return;
    

    let tailleMaDiv = document.getElementById('temoignages-container').style.height /* = tailleMaDiv+"px" */;
    console.log(tailleMaDiv); 

    btnPrev.addEventListener('click', (e) => {
        delta = delta - step;
        slider.style.transform = `translate(${delta}px,0)`;
         if (delta < 1500) {
            delta = 0;
        }; 

        
        console.log(delta);


       /*  if (btnleft < cardTemoign) {
            btnleft = cardTemoign;            
        } */
       /*  console.log(btnLeft); */
    });
    
    btnNext.addEventListener('click', (e) => {
        delta = delta + step;
        slider.style.transform = `translate(${delta}px, 0)`;
        console.log(delta);

    });
    
})
let tailleMaDiv =  document.getElementById('temoignages-container').offfserHeight;




