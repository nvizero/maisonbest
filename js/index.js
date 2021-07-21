$(document).ready(function () {

  // var video = $('.slideVideo video')[0];
  // video.currentTime=2;


  $(window).load(function () {


    $('.fs1').flexslider({
      // start: function(){
      //  	if( $('.fs1:eq(0) li:eq(1)').has("video").length ){
      //   	$('.fs1:eq(0) li:eq(1) video').get(0).pause();
      //  	}
      // },
      animation: "slide",
      slideshowSpeed: 3500,
      smoothHeight: true,
      after: function () {
        var video = $('.fs1 .slideVideo video')[0];

        if (video.has("video").length) {

          $('.fs1 .slideVideo').each(function () {
            $(this).get(0).pause();
          });
          if (video.find("video").get(0).currentTime != 0) {
            video.find("video").get(0).play();
          }
        } else {
          $('.fs1 .slideVideo').each(function () {
            $(this).get(0).pause();
          });
        }
      }
    });
    // $('.fs1').flexslider("stop");

    // FullScreen
    var fulls;
    $('.fs1 video , #videoBG').click(function () {
      var h = $(".fs1 .flex-viewport").height();
      var vid = $(this).parent().find("video").get(0);

      if (vid.requestFullscreen) {

        vid.requestFullscreen();
        exitFull(h);
        $("#videoBG").css("opacity", 0);
        vid.play();

      } else if (vid.mozRequestFullScreen) {

        vid.mozRequestFullScreen();
        exitFull(h);
        $("#videoBG").css("opacity", 0);
        vid.play();

      } else if (vid.webkitRequestFullscreen) {

        vid.webkitRequestFullscreen();
        exitFull(h);
        $("#videoBG").css("opacity", 0);
        vid.play();

      }
    });

    // $("video").bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
    //  if( document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen ){
    //   fulls = $(".flex .flex-viewport").height();
    //  }
    //  else{
    //   setTimeout(function(){
    //    $(".flex .flex-viewport").height(fulls);
    //   },500);
    //  }
    // });

    function exitFull(h) {
      $(".fs1 .flex-viewport").height(h);
    }

    // if hover .fs1
    $(".fs1").hover(function () {
      $('.fs1').flexslider("pause");
    }, function () {
      $('.fs1').flexslider("play");
    });

    $('.slick').slick({
      draggable: false,
      prevArrow: $("#prev"),
      nextArrow: $("#next")
    });

    $(".slick4").slick({
      prevArrow: $("#case .select .left"),
      nextArrow: $("#case .select .right"),
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

  $(".viewmore img").click(function () {
    $("html , body").animate({"scrollTop": $("#news").offset().top});
  });

  $("#case .detail img").click(function () {
    $("#case .detail").toggleClass("close");
    $("#case button").toggleClass("close");
  });

  $("#case .slick ,#prev , #next").hover(function () {
    $("#prev , #next").addClass("move");
  }, function () {
    $("#prev , #next").removeClass("move");
  });


  var url = location.search;
  var rid;
  if (url.indexOf("?") == -1) {//電腦版網址後方沒有參數，就自動進入手機版判斷程式
    if (navigator.userAgent.match(/Android|iPhone|iPad/i)) {
      // alert('qqq');
      //  window.location = 'cart3';
      $(".fs1 #videoBG").css({"display": "none"});
      var video2 = $('#video-active')[0];
      // myVid = document.getElementById('video-active');
      video2.currentTime = 6;
      // var video=$("#video-active")[0];
      // video.currentTime=5;
      // $("#video-active")[0].play();
      // myVid.addEventListener("canplay",function() { myVid.currentTime = 5;});
      // var vid = document.getElementById("video-active");
      // vid.currentTime = "5";


    }

  }
});
