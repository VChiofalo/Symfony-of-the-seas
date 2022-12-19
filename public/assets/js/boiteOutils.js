let atelier = document.getElementById('boutonateliers');
let article = document.getElementById('boutonarticles');
let ateliers = document.querySelectorAll('');
let articles = document.querySelectorAll('');
// Gestionnaire d'event
atelier.addEventListener('click', () => {
    if (article.classList.contains('actif')) {
        atelier.classList.add('actif');
        ateliers.classList.remove('inactif');
        article.classList.remove('actif');
        article.classList.add('inactif');
    } else {
        atelier.classList.toggle('actif');
        ateliers.classList.remove('inactif');
        article.classList.add('inactif');
    }
})

article.addEventListener('click', () => {
    if (atelier.classList.contains('actif')) {
        article.classList.add('actif');
        articles.classList.remove('inactif');
        atelier.classList.remove('actif');
        ateliers.classList.add('inactif');
    } else {
        article.classList.toggle('actif');
        articles.classList.remove('inactif');
        ateliers.classList.add('inactif');
    }
}) 