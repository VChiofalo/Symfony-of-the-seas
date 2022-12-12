// let map= document.querySelector('#map');
// let paths = map.querySelectorAll('.map_img');
// var cards = map.querySelectorAll('.map_list');


// paths.forEach (function (path){
//     path.addEventListener('mouseenter', function(e){
//         let onClick = this.id.replace('region-', '');
//         document.querySelector('#list-'+ id).classList.add('is-active');
//     })

// });


// Fonction pour faire passer un path devant les autres
document.addEventListener('DOMContentLoaded', (e) => {

    let lands = document.querySelectorAll('.land');
    let mapSVG = document.querySelector('#map svg');
    lands.forEach(land => {
        
        land.addEventListener('mouseover', (e)=> {
            mapSVG.removeChild(e.target);
            mapSVG.appendChild(e.target);
        });
    });

});

/* function landClicked(){
    console.log('.land');
    if(.lands)
}
 */







