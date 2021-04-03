//nav slider 
const navSlide = () => {
    const burger = document.querySelector('.burger')
    const nav = document.querySelector('.nav-links');
    //toggle nav
    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active')

    //burger anim
    burger.classList.toggle('toggle');
    });
}
navSlide();
//
