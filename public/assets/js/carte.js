
// Selectionne les regions/academies
document.addEventListener('DOMContentLoaded', (e) => {

    let lands = document.querySelectorAll('.land');
    let mapSVG = document.querySelector('#map svg');
    let activeLand = null;
    // Boucle pour faire passer un path devant les autres
    lands.forEach(land => {

        // ajout du mouseover sur les lands
        land.addEventListener('mouseover', (e) => {
            mapSVG.removeChild(e.target);
            mapSVG.appendChild(e.target);
        });

        // ajout du click sur les lands
        land.addEventListener('click', (e) => {
            
            // land precedent
            if(activeLand) 
                activeLand.classList.remove('land_active');
            
            // land sur lequel on a cliqué
            e.target.classList.add('land_active');
            activeLand = e.target;
        })
    });
    lands.forEach(land => {
        land.addEventListener('click', (e) => {
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

        // Récupère l'API (Academie + numéro de téléphone)
        let id = land.id;
        fetch('/apicontact/' + id)
            .then(function (header) {
                return header.json();
            })
            .then(function (body) {
                let AcademyName = document.getElementById('name');
                let AcademyContacts = document.getElementById('contact');

            // Push les informations récupérées de l'API coté HTML
                AcademyName.innerHTML = body.name;
                AcademyContacts.innerHTML = body.contact;
            })
    }
});









