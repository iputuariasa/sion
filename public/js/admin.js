//menuToggle
let toggle = document.querySelector('.toggle');
let nav = document.querySelector('.nav');
let main = document.querySelector('.main');

toggle.onclick = function() {
    nav.classList.toggle('active');
    main.classList.toggle('active');
}

//add hovered class in selected list item
let list = document.querySelectorAll('.nav li');
function activeLink() {
    list.forEach((item) =>
    item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) =>
item.addEventListener('mouseover', activeLink));

const toggleUser = document.querySelector('.toggle-user img');
const boxUser = document.querySelector('.user-box');

toggleUser.addEventListener('click', function () {
    boxUser.classList.toggle('showUser');
})

// Profil Biodata
// const btnBiodata = document.querySelector('.box-btnBiodata btn-biodata');
// const boxTest = document.querySelector('.boxText');

// btnBiodata.addEventListener('click', function(){
//     boxTest.classList.add('berubah');
// })