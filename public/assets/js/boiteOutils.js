// Déclaration des variables
let btnAtelier;
let btnArticle;
let ateliersCartes;
let articlesCartes;
// Récuperation du Dom
btnAtelier = document.getElementById('boutonateliers');
btnArticle = document.getElementById('boutonarticles');
/* ateliersCartes = document.querySelectorAll('');
articlesCartes = document.querySelectorAll(''); */
// Gestionnaire d'event
btnAtelier.addEventListener('click', () => {
    if (btnAtelier.classList.contains('actif')) {
        return;
    }

    if (btnArticle.classList.contains('actif')) {
        btnAtelier.classList.add('actif');
/*         ateliersCartes.classList.remove('inactif'); */
        btnArticle.classList.remove('actif');
/*         articlesCartes.classList.add('inactif'); */
    } else {
        btnAtelier.classList.add('actif');
/*         ateliersCartes.classList.remove('inactif');
        articlesCartes.classList.add('inactif'); */
    }
})

btnArticle.addEventListener('click', () => {
    if (btnArticle.classList.contains('actif')) {
        return;
    }

    if (btnAtelier.classList.contains('actif')) {
        btnArticle.classList.add('actif');
/*         articlesCartes.classList.remove('inactif'); */
        btnAtelier.classList.remove('actif');
/*         articlesCartes.classList.add('inactif'); */
    } else {
        btnArticle.classList.add('actif');
/*         articlesCartes.classList.remove('inactif');
        articlesCartes.classList.add('inactif'); */
    }
}) 