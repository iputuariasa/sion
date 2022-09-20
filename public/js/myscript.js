const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('.nav .ul');

menuToggle.addEventListener('click', function(){
    nav.classList.toggle('slide');
})

const toggleUser = document.querySelector('.box-imgUser img');
const boxUser = document.querySelector('.user-box');

toggleUser.addEventListener('click', function () {
    boxUser.classList.toggle('showUser');
})

// toggleUser.addEventListener('mouseenter', function (){
//     boxUser.classList.add('showUser');
// })

// boxUser.addEventListener('mouseleave', function (){
//     boxUser.classList.remove('showUser');
// })