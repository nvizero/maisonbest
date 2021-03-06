
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="/fake/css/common.css">
    <link rel="stylesheet" href="/fake/css/index.css">
    <link rel="shortcut icon" href="/fake/img/logo2.svg">
    <title>米築</title>
</head>

@include("ba")
<body>
@include("ga_code")


<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "logo": "http://maisonbest.com.tw/images/logo.png",
  "name": "米築",
  "url": "http://maisonbest.com.tw/",
  "sameAs": [
    "https://www.facebook.com/maisonbest",
    "https://www.youtube.com/channel/UC_b2d3l7qq1qvWEoGc_wYmw"
  ]
}
</script>

<!-- header start -->
@include("frontend1101.comm.header")
<!-- header end -->
<!-- 輪播 -->
@include("frontend1101.comm.top_ad")
<!-- 輪播 -->

<!-- 生活美學 -->
@include("frontend1101.deco_mobile")



<section class="index_casePage container">
    <div class="row">
        <div class="title_row">
            <img src="/html1101/img/case.svg" alt="">
            <h2>新案訊息</h2>
            <span>CASE</span>
        </div>
    </div>
    @include("frontend1101.frontdemo")


</section>

<style type="text/css">

</style>
<!-- 建案廣告 -->

<div style="overflow-x: hidden;margin: 0 auto;max-width: 1200px;">
    <div style="width: 100%;">
        <div >
            <div class="row-marquee" >
                <div class="marquee" id="m">
                    @foreach($ad_8 as $ad8)
                        @if(  !empty($ad8->image) AND File::exists( public_path().$ad8->image)  )
                            <a href="{{$ad8->url}}" target="_new">
                                <img src="/public{{$ad8->image}}" style="width:140px;height:80px;">
                            </a>
                        @endif
                    @endforeach
                    @foreach($ad_8 as $ad8)
                        @if(  !empty($ad8->image) AND File::exists( public_path().$ad8->image)  )
                            <a href="{{$ad8->url}}" target="_new">
                                <img src="/public{{$ad8->image}}" style="width:140px;height:80px;">
                            </a>
                        @endif
                    @endforeach
                    @foreach($ad_8 as $ad8)
                        @if(  !empty($ad8->image) AND File::exists( public_path().$ad8->image)  )
                            <a href="{{$ad8->url}}" target="_new">
                                <img src="/public{{$ad8->image}}" style="width:140px;height:80px;">
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<!-- 人物觀點 -->
<section class="index_peoplePage">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="index_picBox">
                    <a href="/people2/{{$people->id}}">
                        @if(  !empty($people->image) AND File::exists( public_path().$people->image)  )
                            <img src="/public{{$people->image}}" />
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 index_peopleTextbox">
                <div class="title_col">
                    <img src="/fake/img/people.svg" alt="">
                    <h2>人物觀點</h2>
                    <span>PEOPLE</span>
                </div>
                <div class="index_people_item align-self-end">
                    <h3>{{$people->title}}</h3>
                    <p>
                        <?php
                        echo ms_str($people->content);
                        ?>
                    </p>
                    <a href="/people2/{{$people->id}}" alt="more">
                        <div class="button_more_w">MORE</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 地產動態 -->
<section class="index_newsPage">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="index_newsPic">
                    <img src="/fake/news02.jpg" alt="新聞">
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="title_left">
                    <img src="/fake/img/news.svg" alt="">
                    <h2>地產動態</h2>
                    <span>NEWS</span>
                    <div class="clear"></div>
                </div>
                <div class="index_newsTextbox">
                    @foreach($posts as $_new)
                        <a href="/news2/{{$_new->id}}">
                            <div class="textItem">
                                <time datatime="{{$_new->date}}">{{$_new->date}}</time>
                                <div class="index_newsType">{{$_new->cate}}</div>
                                <p><?php  echo ms_str($_new->content);?></p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 關於米築 -->
<section class="index_aboutPage">
    <div class="index_content">
        <div class="index_containerHalf_L">
            <div class="title_row">
                <h2>關於米築</h2>
                <span>ABOUT</span>
            </div>
            <div class="index_aboutText">
                <p>米築取自於法文的「<b>Maison</b>」，做為名詞為「家」之意，當成形容詞則是「獨門的」，所以我們將兩者合一，並以時尚、質感為主軸，建構全台灣最獨特的房地產網站─米築株式會社。</p>

                <p>一棟建築從無到有，必須「理性」考量動線、尺寸、坪效、機能性；當住進去後，人與空間產生互動情感，反映在內心世界的「感性」軸線上。</p>
                <p>就像建築一樣，米築兼具理性與感性！</p>
            </div>
        </div>
    </div>
    <div class="index_content">
        <div class="index_containerHalf_R ">
            <div class="index_picBox"><img src="/fake/index01.jpg" alt=""></div>
            <div class="index_picBox"><img src="/fake/index02.jpg" alt=""></div>
            <div class="index_picBox"><img src="/fake/index03.jpg" alt=""></div>
            <div class="index_picBox"><img src="/fake/index04.jpg" alt=""></div>
        </div>
    </div>
</section>
<!-- footer start -->

@include("frontend1101.comm.footer")

<!-- footer end & To Top-->
<a href="javascript:;">
    <div class="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>
</a>


<section class="ig_section">
    <div class="row">
        <div class="ig_run scrollbox">
            <ul class="justify-content-center">
                <?php
                $igs = Ig::take(8)->orderBy('pr','asc')->get();
                ?>
                @foreach($igs as $ig)
                <li>
                    <a href="{{$ig->url}}" target="_blank">
                        <img src="/public{{$ig->image}}" alt="">
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</section>

<!--javascript-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
<script src="https://use.fontawesome.com/826a7e3dce.js"></script>
<!-- javascript -->
<script src="/fake/js/common.js"></script>



<script src="/js/slick.min.js"></script>
<script src="/js/Crawler.js"></script>
<script>
    if($(window).width() >= '768'){
        $(".deco-carousel").addClass("owl-carousel");
    }

    $("document").ready(function(){
        marqueeInit({
            uniqueid: 'm',
            style: {
                'width': '100%',
                'height': '100px'
            },
            inc: 5, //speed - pixel increment for each iteration of this marquee's movement
            mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
            moveatleast: 2,
            neutral: 150,
            savedirection: true,
            random: true
        });

        $(".marquee0 > div").css({"width":"100%"})



    });
</script>



<link rel="stylesheet" type="text/css" href="/css/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/css/slick/slick-theme.css">

<link rel="stylesheet" type="text/css" href="/fake/css/index2.css">

<style>
    #container {
        overflow-x: hidden;
        margin: 0 auto;
        max-width: 1000px;
    }


    /* case case case case case case case  */

    #case {
        overflow-x: hidden;
        position: relative;
        background: url(/images/index/case_bg1.jpg) bottom no-repeat;
    }

    #case .select {
        margin: 8% 3%;
    }

    #case .select .left {
        float: left;
        margin-top: 12px;
        cursor: pointer;
    }

    #case .select .right {
        float: right;
        margin-top: 12px;
        cursor: pointer;
    }

    #case .select>div {
        display: block;
        overflow: hidden;
        margin: 0 auto;
    }

    .slick4 .area {
        background: url(/images/index/case_bg2.jpg) no-repeat;
        background-size: 100% 100%;
        margin: 5px;
        width: 178px;
        height: 75px;
        padding: 10px 0;
        color: #FFF;
        font-size: 16px;
        text-align: center;
        cursor: pointer;
    }

    .slick4 .area a {
        color: #FFF;
        text-decoration: none;
    }

    .slick4 .area a p {
        color: #FFF;
        padding: 0;
        margin: -2px 0 0 0;
        text-align: center;
    }

    #case .slick2 {
        position: relative;
        margin: 0 1%;
    }

    #case .slick2>img {
        width: 100%;
    }

    #case .slick2 .detail {
        position: absolute;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.7);
        width: 100%;
        padding: 0 10%;
        padding-bottom: 35px;
        color: #FFF;
    }

    #case .slick2 .detail img {
        display: block;
        margin: 0 auto 20px;
        margin-top: -35px;
        cursor: pointer;
    }

    #case .slick2 .detail span {
        background-color: #b28850;
        padding: 5px 20px;
        color: #FFF;
        font-weight: bold;
        letter-spacing: 2px;
    }


    /* close */

    #case button.close {
        top: 40%;
        transform: translateY(-40%);
        -webkit-transform: translateY(-40%);
    }

    #case .slick2 .detail.close {
        max-height: 40px;
        overflow: hidden;
        transition: max-height 1s;
        -webkit-transition: 1s;
    }

    #case .slick2 .detail.close img {
        margin-top: 0;
    }

    #case .slick2 .detail.close p {
        visibility: hidden;
    }

    #case .slick2 .detail ul {
        float: left;
        margin: 10px 0;
        width: 50%;
        list-style-type: none;
    }

    #case .slick2 .detail ul li {
        margin: 8px 0;
        letter-spacing: 1px;
    }

    #case .slick-list {
        overflow: visible;
    }

    .slick-slider {
        margin-bottom: 0;
    }

    #case button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        background: none;
        width: 26px;
        height: 44px;
        border: none;
        cursor: pointer;
    }

    #case button:focus {
        outline: none;
    }

    #prev {
        left: 0%;
        background-size: 100% 100%;
        transition: 0.5s;
        -webkit-transition: 0.5s;
    }

    #prev.move {
        left: 10%;
    }

    #prev:before {
        content: '\f001';
        display: inline-block;
        color: rgba(255, 255, 255, 0.5);
        font-family: "flexslider-icon";
        font-size: 40px;
    }

    #next {
        right: 0%;
        background: url(../images/index/next.png);
        background-size: 100% 100%;
        transition: 0.5s;
        -webkit-transition: 0.5s;
    }

    #next.move {
        right: 10%;
    }

    #next:before {
        content: '\f002';
        display: inline-block;
        color: rgba(255, 255, 255, 0.5);
        font-family: "flexslider-icon";
        font-size: 40px;
    }

    #case>p {
        text-align: center;
        padding: 30px 0;
    }

    #case>p .link {
        float: none;
        display: block;
        margin: 10px auto;
        width: 56px;
    }

    @media (max-width: 768px) {
        #case button {
            top: 30%;
            transform: translateY(-30%);
            -webkit-transform: translateY(-30%);
        }
        #case .slick2 .detail {
            overflow: auto;
            position: relative;
        }
        #case .slick2 .detail img {
            margin-top: 0;
        }
    }

    @media (max-width: 480px) {
        #case button {
            top: 20%;
            transform: translateY(-20%);
            -webkit-transform: translateY(-20%);
        }
        #case .slick2 .detail {
            height: 100%;
        }
        #case .slick2 .detail ul {
            margin: 0;
            width: 100%;
        }
        #case .slick2 .detail ul li {
            margin: 15px 0 0;
        }
    }

    .flexslider .youtube {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
    }

    .flexslider .youtube iframe {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .link {
        float: right;
        background-color: #700;
        margin: 10px 20px 0 0;
        padding: 5px 20px;
        color: #FFF;
    }
</style>



</body>

</html>
