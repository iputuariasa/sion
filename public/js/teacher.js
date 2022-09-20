const navbar = document.querySelector('.navbar');
const arrowA = document.querySelector('.arrow');
const main = document.querySelector('.main');
const arrowB = document.querySelector('.toggle');
const profil = document.querySelector('.profil');

arrowA.addEventListener('click', function(){
    navbar.classList.add('hide');
    main.classList.add('show');
    arrowB.classList.add('show');
})

arrowB.addEventListener('click', function(){
    navbar.classList.remove('hide');
    main.classList.remove('show');
    arrowB.classList.remove('show');
})

profil.addEventListener('toggle', function(){

})
