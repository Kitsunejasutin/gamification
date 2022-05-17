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

    $('.action').click(function() {
     $('#addModal').css('display','block');
    });
       
    $('.close').click(function () {
        $('#myModal').css('display', 'none');
    });
    
    $('.close').click(function () {
        $('#addModal').css('display', 'none');
    });

    $("#submit").click(function() {
        $.ajax({
            type: 'POST',
            url: "includes/search.php",
            data: {
                id: $("#book_search").val(),
                account: $("#account-result").val(),
            },
            success: function (data) {
                $('#results').html(data);
            }
        });
    });

    $("#query").click(function() {
        $.ajax({
            type: 'POST',
            url: "includes/query.php",
            data: {
                id: $("#book_return").val(),
                account: $("#account-result").val(),
            },
            success: function (data) {
                $('#results').html(data);
            }
        });
    });

    $("input[name=account]").focusout(function (e) {
        $('#account-result').val($("input[name=account]").val());
        e.preventDefault();
    });

    getPagination('#tableData');

    function getPagination(table) {
        var lastPage = 1;

        $('#maxRows')
        .on('change', function(evt) {

        lastPage = 1;
        $('.pagination')
        .find('li')
        .slice(1, -1)
        .remove();
        var trnum = 0; 
        var maxRows = parseInt($(this).val()); 

        if (maxRows == 5000) {
        $('.pagination').hide();
        } else {
        $('.pagination').show();
        }

        var totalRows = $(table + ' tbody tr').length;
        $(table + ' tr:gt(0)').each(function() {

            trnum++;
            if (trnum > maxRows) {


            $(this).hide();
            }
            if (trnum <= maxRows) {
            $(this).show();
            } 
            }); 
            if (totalRows > maxRows) {

            var pagenum = Math.ceil(totalRows / maxRows); 

            for (var i = 1; i <= pagenum; ) {
            $('.pagination #prev')
            .before(
                '<li data-page="' +
                i +
                '">\
                <span>' +
                i++ +
                '<span class="sr-only">(current)</span></span>\
                    </li>'
            )
            .show();
        }
    } 
    $('.pagination [data-page="1"]').addClass('active'); 
    $('.pagination li').on('click', function(evt) {

    evt.stopImmediatePropagation();
    evt.preventDefault();
    var pageNum = $(this).attr('data-page'); 

    var maxRows = parseInt($('#maxRows').val()); 
    if (pageNum == 'prev') {
    if (lastPage == 1) {
    return;
    }
    pageNum = --lastPage;
    }
    if (pageNum == 'next') {
        if (lastPage == $('.pagination li').length - 2) {
        return;
        }
        pageNum = ++lastPage;
    }

    lastPage = pageNum;
    var trIndex = 0; 
    $('.pagination li').removeClass('active');
    $('.pagination [data-page="' + lastPage + '"]').addClass('active');
    limitPagging();
    $(table + ' tr:gt(0)').each(function() {

    trIndex++;

    if (
        trIndex > maxRows * pageNum ||
        trIndex <= maxRows * pageNum - maxRows
    ) {
        $(this).hide();
    } else {
        $(this).show();
    } 
    });
    });
    limitPagging();
    })
    .val(5)
    .change();
        
    const track = document.querySelector('.carousel__track');
    const slides = Array.from(track.children);
    const nextButton = document.querySelector('.carousel__button--right');
    const prevButton = document.querySelector('.carousel__button--left');
    const dotsNav = document.querySelector('.carousel__nav');
    const dots = Array.from(dotsNav.children);
        
    const slideWidth = slides[0].getBoundingClientRect().width;
    
    // arrange the slides next to one another
        const setSlidePosition = (slide, index) => {
            slide.style.left = slideWidth * index + 'px';
        };
        slides.forEach(setSlidePosition);
        
        const moveToSlide = (track, currentSlide, targetSlide) => {
            track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
            currentSlide.classList.remove('current-slide');
            targetSlide.classList.add('current-slide');
        }

        const updateDots = (currentDot, targetDot) => {
            currentDot.classList.remove('current-slide');
            targetDot.classList.add('current-slide');
        }

        const hideShowArrows = (slides, prevButton, nextButton, targetIndex) => {
            if (targetIndex === 0) {
                prevButton.classList.add('is-hidden');
                nextButton.classList.remove('is-hidden');
            } else if (targetIndex === slides.length - 1) {
                prevButton.classList.remove('is-hidden');
                nextButton.classList.add('is-hidden');
            } else {
                prevButton.classList.remove('is-hidden');
                nextButton.classList.remove('is-hidden');
            }
        }
    // Click Left
        $(prevButton).click(function (e) {
            const currentSlide = track.querySelector('.current-slide');
            const prevSlide = currentSlide.previousElementSibling;
            const currentDot = dotsNav.querySelector('.current-slide')
            const prevDot = currentDot.previousElementSibling;
            const prevIndex = slides.findIndex(slide => slide === prevSlide);
 
            moveToSlide(track, currentSlide, prevSlide);
            updateDots(currentDot, prevDot);
            hideShowArrows(slides, prevButton, nextButton, prevIndex)
        });
    // Click Right
        $(nextButton).click(function (e) {
            const currentSlide = track.querySelector('.current-slide');
            const nextSlide = currentSlide.nextElementSibling;
            const currentDot = dotsNav.querySelector('.current-slide')
            const nextDot = currentDot.nextElementSibling;
            const nextIndex = slides.findIndex(slide => slide === nextSlide);
                
            moveToSlide(track, currentSlide, nextSlide);
            updateDots(currentDot, nextDot);
            hideShowArrows(slides, prevButton, nextButton, nextIndex);
        });
    // move nav indicators
        $(dotsNav).click(function (e) {
            const targetDot = e.target.closest('button');

            if (!targetDot) return;

            const currentSlide = track.querySelector('.current-slide');
            const currentDot = dotsNav.querySelector('.current-slide');
            const targetIndex = dots.findIndex(dot => dot === targetDot);
            const targetSlide = slides[targetIndex];

            moveToSlide(track, currentSlide, targetSlide);
            updateDots(currentDot, targetDot);
            hideShowArrows(slides, prevButton, nextButton, targetIndex)

        });       
}
 
function limitPagging(){

if($('.pagination li').length > 7 ){
    if( $('.pagination li.active').attr('data-page') <= 3 ){
        $('.pagination li:gt(5)').hide();
        $('.pagination li:lt(5)').show();
        $('.pagination [data-page="next"]').show();
    }if ($('.pagination li.active').attr('data-page') > 3){
        $('.pagination li:gt(0)').hide();
        $('.pagination [data-page="next"]').show();
        for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
        $('.pagination [data-page="'+i+'"]').show();

    }

    }
}
}

$(function() {

    $('.tableone tr:eq(0)').prepend('<th class="header"> <b>#</b> </th>');

    var id = 0;

    $('.tableone tr:gt(0)').each(function() {
        id++;
        $(this).prepend('<th>' + id + '</th>');
    });
});
    
$(function() {

    $('.tabletwo tr:eq(0)').prepend('<th class="header"> <b>#</b> </th>');

    var id = 0;

    $('.tabletwo tr:gt(0)').each(function() {
        id++;
        $(this).prepend('<th>' + id + '</th>');
    });
});
    
$(function() {

    $('.onetable tr:eq(0)').prepend('<th class="header"> <b>#</b> </th>');

    var id = 0;

    $('.onetable tr:gt(0)').each(function() {
        id++;
        $(this).prepend('<th>' + id + '</th>');
    });
});
    
    $('#search').change(function () {
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: 'includes/search.php',
            data: {
                'id':id
            },
            success: function (data) {
                $('#result').html(data);
            }
        });
});
    
});
