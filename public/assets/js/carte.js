// let map= document.querySelector('#map');
// let paths = map.querySelectorAll('.map_img');
// var cards = map.querySelectorAll('.map_list');



// paths.forEach (function (path){
//     path.addEventListener('mouseenter', function(e){
//         let onClick = this.id.replace('region-', '');
//         document.querySelector('#list-'+ id).classList.add('is-active');
//     })

// });

let elements = document.getElementsByClassName('land');

for (let i = 0; i < elements.length; i++){
    elements[i].addEventListener('mouseenter', function(e){
        let plop = document.createElementNS(elements[i], 'path')
        console.log(elements[i].id)
        elements[i].parentNode.appendChild(plop)})
}