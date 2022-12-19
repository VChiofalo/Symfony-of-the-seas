const nav = document.querySelector('.navbar');
let height = 100;

window.addEventListener('scroll', () => {
    if(window.scrollY > height) {
        nav.classList.add('scrollnav');
    }
    else{
        nav.classList.remove('scrollnav');
    }
});