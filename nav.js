let daynight = document.querySelector('.daynight')
let menutoggle = document.querySelector('.menutoggle')
let body = document.querySelector('body')
let navigation = document.querySelector('nav')
let logo = document.querySelector('.logo')
let myaccount = document.querySelector('.myAccount')

daynight.onclick = function() {
    body.classList.toggle('dark')
    daynight.classList.toggle('active')
}

menutoggle.onclick = function() {
    menutoggle.classList.toggle('active')
    navigation.classList.toggle('active')
    daynight.classList.toggle('activo')
    logo.classList.toggle('active')
    myaccount.classList.toggle('active')
}
window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("down",window.scrollY>0);
})