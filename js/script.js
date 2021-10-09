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
})
