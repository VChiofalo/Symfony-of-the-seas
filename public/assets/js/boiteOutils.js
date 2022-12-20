// Déclaration des variables
let btnAtelier;
let btnArticle;
let ateliersCartes;
let articlesCartes;

// Récuperation du Dom
btnAtelier = document.getElementById('boutonateliers');
btnArticle = document.getElementById('boutonarticles');
ateliersCartes = document.querySelectorAll('.atelier');
articlesCartes = document.querySelectorAll('.article');

// Gestionnaire d'event bouton atelier
btnAtelier.addEventListener('click', () => {
    if (btnAtelier.classList.contains('actif')) {
        return;
    }

    if (btnArticle.classList.contains('actif')) {
        btnAtelier.classList.add('actif');
        ateliersCartes.forEach(element => {
            element.classList.remove('inactif');
        });
        btnArticle.classList.remove('actif');
        articlesCartes.forEach(element => {
            element.classList.add('inactif');
        });
    }
})

// Gestionnaire d'event bouton article
btnArticle.addEventListener('click', () => {
    if (btnArticle.classList.contains('actif')) {
        return;
    }

    if (btnAtelier.classList.contains('actif')) {
        btnArticle.classList.add('actif');
        articlesCartes.forEach(element => {
            element.classList.remove('inactif');
        });
        btnAtelier.classList.remove('actif');
        ateliersCartes.forEach(element => {
            element.classList.add('inactif');
        });
    }
}) 