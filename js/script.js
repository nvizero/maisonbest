$(document).ready(function(){

	$(window).load(function(){
		$('.fs2').flexslider({
			animation: "fade",
			slideshowSpeed: 3500,
		});
	});

	$("#toTop").click(function(){
		$("html ,  body").animate({"scrollTop": 0});
	});	

	marqueeInit({
		uniqueid: 'm',
		style: {
			'width': '100%',
			'height': '80px'
		},
		inc: 5, //speed - pixel increment for each iteration of this marquee's movement
		mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
		moveatleast: 2,
		neutral: 150,
		savedirection: true,
		random: true
	});
	marqueeInit({
		uniqueid: 'm2',
		style: {
			'width': '100%',
			'height': '80px'
		},
		inc: 5, //speed - pixel increment for each iteration of this marquee's movement
		mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
		moveatleast: 2,
		neutral: 150,
		savedirection: true,
		random: true
	});
	marqueeInit({
		uniqueid: 'm3',
		style: {
			'width': '100%',
			'height': '80px'
		},
		inc: 5, //speed - pixel increment for each iteration of this marquee's movement
		mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
		moveatleast: 2,
		neutral: 150,
		savedirection: true,
		random: true
	});


	$(".slick3 > div:eq(0)").click(function(){
        $(".googlemap iframe").animate({height: 0});
    });
    $(".slick3 > div:not(:eq(0))").click(function(){
        if( window.innerWidth > 768 ){
            $(".googlemap iframe").animate({height: 500});
        }
        else{
            $(".googlemap iframe").animate({height: 300});
        }
    });

    $(".slick3").slick({
        prevArrow: $("#map .select .left"),
        nextArrow: $("#map .select .right"),
        infinite: false,
        slidesToShow: 5,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
        ]
    });
});