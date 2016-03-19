
(function(){

$(window).scroll( function(){

  if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

$('a.page-scroll').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1500);
        event.preventDefault();
    });

$('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    })


})();