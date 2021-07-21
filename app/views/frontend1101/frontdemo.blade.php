

<script src="/js/jquery.js"></script>
<script src="/js/jquery.flexslider-min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/Crawler.js"></script>


<?php
$rate_ads = Rate::take(5)->get();
$areas = RateArea::orderBy('prime','asc')->get();
?>

<div id="container">
    <div id="case" style="overflow: hidden;">
        <div class="select" style="height: 36px;">
            <img class="left" src="images/index/case_arrowL.png">
            <img class="right" src="images/index/case_arrowR.png">
            <div class="slick4">
                <div class="area" id="">
                    <a href="/case">
                        <p>全部區域</p>
                        <p>ALL</p>
                    </a>
                </div>
                @foreach($areas as $area)
                    <div class="area" id="{{$area->id}}">
                        <a href="/case?taiwanArea={{$area->id}}">
                            <p>{{$area->name}}</p>
                            <p>{{$area->title}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="slick" style="height: 505px;margin: 50px 0 0 0;">
            @foreach($rate_ads as $rate_ad)
                <div class="slick2" style="outline:none;">
                    <?php
                    $r_img = getRateImage($rate_ad->id, 'noAd');
                    ?>
                    @if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
                        <img src="/public{{$r_img->image}}">
                    @else
                    @endif
                    <div class="detail">
                        <img src="images/index/case_close.png">
                        {{$rate_ad->name}}
                        {{rate_info($rate_ad)}}
                    </div>
                </div>
            @endforeach
        </div>

        <button id="prev"></button>
        <button id="next"></button>

        <p class="summary">
            <span class="EN" style="display: none;">CASE</span>
            <span class="CH" style="display: none;"> /新案訊息</span>
            <a href="/case"  style="display: none;" ><span class="link">MORE</span></a>
        </p>
    </div>
</div>


<script>
    $(document).ready(function () {
        $(window).load(function () {
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

        if (url.indexOf("?") == -1) {//電腦版網址後方沒有參數，就自動進入手機版判斷程式
            if (navigator.userAgent.match(/Android|iPhone|iPad/i)) {
                $(".fs1 #videoBG").css({"display": "none"});
                var video2 = $('#video-active')[0];
                video2.currentTime = 6;
            }
        }
    });

</script>
