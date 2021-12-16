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

    $('.action').click(function() {
     $('#addModal').css('display','block');
    });
       
    $('.close').click(function () {
        $('#myModal').css('display', 'none');
    });
    
    $('.close').click(function () {
        $('#addModal').css('display', 'none');
    });

    $('#search_text').keypress(function () {
        $.ajax({
            type: 'POST',
            url: "includes/search.php",
            data: {
                name:$("#search_text").val(),
            },
            success: function (data) {
                $('#result').html(data);
            }
        });
    });
    
});
