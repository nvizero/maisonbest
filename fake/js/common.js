// Back To Top 置頂
var amountScrolled = 500;
$('.backToTop').click(function() {
    $('body,html').animate({
        scrollTop: 0
    }, 2000, 'easeOutQuint');
    return false;
});

//隱私聲明
$(".ico-spr.profile").on("click", function() {
    $(".modal-login").css('display', 'flex');
    setTimeout(function() {
        $(".modal-login").addClass('open');
    }, 1)
});
$("body").click(function(e) {
        if ($(".modal-login").hasClass("open")) {
            if (!$(".modal-login").has(e.target).length) {
                $('.modal-login').removeClass('open');
                setTimeout(function() {
                    $(".modal-login").css('display', 'none');
                }, 50)
            }
        }
    })
$(".modal-close").on("click", function() {
    $('.modal-login').removeClass('open');
    setTimeout(function() {
        $(".modal-login").css('display', 'none');
    }, 50)
})

//index-CASE
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: [
      "<i class='fa fa-caret-left'></i>",
      "<i class='fa fa-caret-right'></i>"
    ],
    navigation : true,
    pagination: false,
    itemsScaleUp: true,
    addClassActive: true,
    autoplay: true,
    autoplayHoverPause: true,
    
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 4
      }
    }
});
