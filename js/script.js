const modalcont = document.querySelector('.modal-content');
const bgmodal = document.querySelector('.bg-modal');
const modalBtn = document.getElementById('login');
const exit = document.querySelector('.close');

modalBtn.addEventListener('click', function() {
    bgmodal.style.display = 'flex';
});

exit.addEventListener('click', function() {
    bgmodal.style.display = 'none';
});

modalBtn.addEventListener("click", () => {
    modalcont.id = "open"
});

const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');


    //Toogle
    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');


        //Animation
        navLinks.forEach((link, index) => {
            if (link.style.animation){
                link.style.animation = ''
            }else{
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
            }
        });
        //Burger
        burger.classList.toggle('toggle');
    });

}

navSlide();
