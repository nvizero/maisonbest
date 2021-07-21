// Back To Top 置頂
var amountScrolled = 500;
$(window).scroll(function() {
    if ($(window).scrollTop() > amountScrolled) {
        $('.backToTop').addClass('show');
    } else {
        $('.backToTop').removeClass('show');
    }
});
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
    //modal-close-btn
$(".modal-close").on("click", function() {
    $('.modal-login').removeClass('open');
    setTimeout(function() {
        $(".modal-login").css('display', 'none');
    }, 50)
})