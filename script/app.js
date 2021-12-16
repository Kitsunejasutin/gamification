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

    $('#tableData').paging({ limit: 5 });
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);
    
    (function () {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    });

    $('.action').click(function() {
     $('#addModal').css('display','block');
    });
       
    $('.close').click(function () {
        $('#myModal').css('display', 'none');
    });
    
    $('.close').click(function () {
        $('#addModal').css('display', 'none');
    });
});
