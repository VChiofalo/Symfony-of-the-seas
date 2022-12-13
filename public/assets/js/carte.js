// let map= document.querySelector('#map');
// let paths = map.querySelectorAll('.map_img');
// var cards = map.querySelectorAll('.map_list');


// paths.forEach (function (path){
//     path.addEventListener('mouseenter', function(e){
//         let onClick = this.id.replace('region-', '');
//         document.querySelector('#list-'+ id).classList.add('is-active');
//     })

// });


document.addEventListener('DOMContentLoaded', (e) => {
    
    let lands = document.querySelectorAll('.land');
    let mapSVG = document.querySelector('#map svg');
    // Boucle pour faire passer un path devant les autres
    lands.forEach(land => {
        
        land.addEventListener('mouseover', (e)=> {
            mapSVG.removeChild(e.target);
            mapSVG.appendChild(e.target);
        });
    });
    lands.forEach(land => {
        land.addEventListener('click', (e)=> {
            changeColor(land)

        });
    });
// Fonction pour ajouter la couleur "pourpre" sur 1 région clickée et remettre la couleur de prédéfinie sur les autres régions
    function changeColor(land) {
        let lands = document.querySelectorAll('.land');
        lands.forEach(land => {
            let color = land.dataset.fill;
            land.setAttribute('fill', color);
        })
        land.setAttribute('fill', '#C33070');
    }
});









