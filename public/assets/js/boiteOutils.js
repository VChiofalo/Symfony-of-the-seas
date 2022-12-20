// Récuperation du Dom
let btnAtelier = document.getElementById('boutonateliers');
let btnArticle = document.getElementById('boutonarticles');
let ateliersCartes = document.querySelectorAll('');
let articlesCartes = document.querySelectorAll('');
// Gestionnaire d'event
btnAtelier.addEventListener('click', () => {
    if (btnAtelier.classList.contains('actif')) {
        return;
    }

    if (btnArticle.classList.contains('actif')) {
        btnAtelier.classList.add('actif');
        ateliersCartes.classList.remove('inactif');
        btnArticle.classList.remove('actif');
        articlesCartes.classList.add('inactif');
    } else {
        btnAtelier.classList.add('actif');
        ateliersCartes.classList.remove('inactif');
        articlesCartes.classList.add('inactif');
    }
})

btnArticle.addEventListener('click', () => {
    if (btnArticle.classList.contains('actif')) {
        return;
    }

    if (btnAtelier.classList.contains('actif')) {
        btnArticle.classList.add('actif');
        articlesCartes.classList.remove('inactif');
        btnAtelier.classList.remove('actif');
        articlesCartes.classList.add('inactif');
    } else {
        btnArticle.classList.add('actif');
        articlesCartes.classList.remove('inactif');
        articlesCartes.classList.add('inactif');
    }
}) 