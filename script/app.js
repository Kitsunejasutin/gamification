$(window).on('load', function () {

    $('.dropdown').hide();

    $('.categories').click(function (e) {
        
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
});
