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

    // When the user clicks on div, open the popup
    $('.popup').click(function () {
        $('#myPopup').addClass('show');
    });

});
