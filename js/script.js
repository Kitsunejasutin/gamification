const body = document.querySelector('.responsive')
const modalcont = document.querySelector('.modal-content');
const modalcont_signup = document.querySelector('.modal-content-signup');
const bgmodal = document.querySelector('.bg-modal');
const bgmodal_signup = document.querySelector('.bg-modal-signup');
const modalBtn = document.getElementById('login');
const signBtn = document.getElementById('btnSignup');
const exit = document.querySelector('.close');
const exit_signup = document.querySelector('.close-signup');
const back = document.querySelector('.left');


modalBtn.addEventListener('click', function() {
    bgmodal.style.display = 'flex';
    body.classList.toggle('overflow-hidden');

});

modalBtn.addEventListener("click", () => {
    modalcont.id = "open";
});

exit.addEventListener('click', function() {
    bgmodal.style.display = 'none';
    body.classList.remove("overflow-hidden");
});

signBtn.addEventListener('click', function() {
    bgmodal.style.display = 'none';
    bgmodal_signup.style.display = 'flex';
});

signBtn.addEventListener("click", () => {
    modalcont_signup.id = "open";
});

back.addEventListener('click', function() {
    bgmodal.style.display = 'flex';
    bgmodal_signup.style.display = 'none';
});

exit_signup.addEventListener('click', function() {
    bgmodal_signup.style.display = 'none';
    body.classList.remove("overflow-hidden");
});


const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');


    //Toogle
    burger.addEventListener('click',()=>{
        //Burger
        burger.classList.toggle('toggle');
    });

}

navSlide();

// Tab 1
var slideIndex1 = 1;
showSlides1(slideIndex1);

function plusSlides1(n) {
    showSlides1(slideIndex1 += n);
}

function currentSlides1(n) {
    showSlides1(slideIndex1 = n);
}

function showSlides1(n) {
    var i;
    var slides1 = document.getElementsByClassName("mySlides-recommendation-1");
    var dot = document.getElementsByClassName("dot");
    if (n > slides1.length) { 
        slideIndex1 = 1;
    }
    if (n < 1) { 
        slideIndex1 = slides1.length
    }
    for (i = 0; i < slides1.length; i++) {
        slides1[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
    }
    slides1[slideIndex1 - 1].style.display = "block";
    dot[slideIndex1 - 1].className += " active";
}

// Tab 2
var slideIndex2 = 1;
showSlides2(slideIndex2);

function plusSlides2(n) {
    showSlides2(slideIndex2 += n);
}

function currentSlides2(n) {
    showSlides2(slideIndex2 = n);
}

function showSlides2(n) {
    var i;
    var slides2 = document.getElementsByClassName("mySlides-recommendation-2");
    var dot = document.getElementsByClassName("dot1");
    if (n > slides2.length) { 
        slideIndex2 = 1;
    }
    if (n < 1) { 
        slideIndex2 = slides2.length
    }
    for (i = 0; i < slides2.length; i++) {
        slides2[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
    }
    slides2[slideIndex2 - 1].style.display = "block";
    dot[slideIndex2 - 1].className += " active";
}

// Tab 3
var slideIndex3 = 1;
showSlides3(slideIndex3);

function plusSlides3(n) {
    showSlides3(slideIndex3 += n);
}

function currentSlides3(n) {
    showSlides3(slideIndex3 = n);
}

function showSlides3(n) {
    var i;
    var slides3 = document.getElementsByClassName("mySlides-recommendation-3");
    var dot = document.getElementsByClassName("dot2");
    if (n > slides3.length) { 
        slideIndex3 = 1;
    }
    if (n < 1) { 
        slideIndex3 = slides3.length
    }
    for (i = 0; i < slides3.length; i++) {
        slides3[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
    }
    slides3[slideIndex3 - 1].style.display = "block";
    dot[slideIndex3 - 1].className += " active";
}

// Tab 4
var slideIndex4 = 1;
showSlides4(slideIndex4);

function plusSlides4(n) {
    showSlides4(slideIndex4 += n);
}

function currentSlides4(n) {
    showSlides4(slideIndex4 = n);
}

function showSlides4(n) {
    var i;
    var slides4 = document.getElementsByClassName("mySlides-recommendation-4");
    var dot = document.getElementsByClassName("dot3");
    if (n > slides4.length) { 
        slideIndex4 = 1;
    }
    if (n < 1) { 
        slideIndex4 = slides4.length
    }
    for (i = 0; i < slides4.length; i++) {
        slides4[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
    }
    slides4[slideIndex4 - 1].style.display = "block";
    dot[slideIndex4 - 1].className += " active";
}

// Tab 5
var slideIndex5 = 1;
showSlides5(slideIndex5);

function plusSlides5(n) {
    showSlides5(slideIndex5 += n);
}

function currentSlides5(n) {
    showSlides5(slideIndex5 = n);
}

function showSlides5(n) {
    var i;
    var slides5 = document.getElementsByClassName("mySlides-recommendation-5");
    var dot = document.getElementsByClassName("dot4");
    if (n > slides5.length) { 
        slideIndex5 = 1;
    }
    if (n < 1) { 
        slideIndex5 = slides5.length
    }
    for (i = 0; i < slides5.length; i++) {
        slides5[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
    }
    slides5[slideIndex5 - 1].style.display = "block";
    dot[slideIndex5 - 1].className += " active";
}

// Tab 6
var slideIndex6 = 1;
showSlides6(slideIndex6);

function plusSlides6(n) {
    showSlides6(slideIndex6 += n);
}

function currentSlides6(n) {
    showSlides6(slideIndex6 = n);
}

function showSlides6(n) {
    var i;
    var slides6 = document.getElementsByClassName("mySlides-recommendation-6");
    var dot = document.getElementsByClassName("dot5");
    if (n > slides6.length) { 
        slideIndex6 = 1;
    }
    if (n < 1) { 
        slideIndex6 = slides6.length
    }
    for (i = 0; i < slides6.length; i++) {
        slides6[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
    }
    slides6[slideIndex6 - 1].style.display = "block";
    dot[slideIndex6 - 1].className += " active";
}

// Tab 7
var slideIndex7 = 1;
showSlides7(slideIndex7);

function plusSlides7(n) {
    showSlides7(slideIndex7 += n);
}

function currentSlides7(n) {
    showSlides7(slideIndex7 = n);
}

function showSlides7(n) {
    var i;
    var slides7 = document.getElementsByClassName("mySlides-recommendation-7");
    var dot = document.getElementsByClassName("dot6");
    if (n > slides7.length) { 
        slideIndex7 = 1;
    }
    if (n < 1) { 
        slideInde7 = slides7.length
    }
    for (i = 0; i < slides7.length; i++) {
        slides7[i].style.display = "none";
    }
    for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(" active", "");
    }
    slides7[slideIndex7 - 1].style.display = "block";
    dot[slideIndex7 - 1].className += " active";
}
