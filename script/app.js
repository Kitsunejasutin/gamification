$(document).ready(function () {

    $('.dropdown').hide();

    $('.categories').click(function(e){
        
        e.preventDefault();
        // hide all span
        var $this = $(this).parent().find('.dropdown');
        $(".dropdown").not($this).slideUp();
        
        // here is what I want to do
        $this.toggle(300);
        
    });

    $('.popuptext-account').hide();

    $('.account').click(function () {
        $('.popuptext-account').toggle();
    })

    var modal = document.getElementById("myModal");

    var btn = document.getElementById("myPopup");

    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});
