<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="米築"></meta>
    <meta property="og:type" content="房地產"></meta>
    <meta property="fb:app_id" content="1325670327461704"/>
    <meta property="og:url" content="{{Request::url()}}"></meta>
    <meta property="og:description"
          content="全台最有溫度的地產網站「米築株式會社」集合全台最頂尖的編輯群，為讀者提供一手房市資訊，努力發掘台灣優質建築，以及精彩的人物故事，提供讀者多元豐富的閱讀體驗。"></meta>
    <meta property="og:site_name" content="米築"></meta>
    <meta name="description" content="全台最有溫度的地產網站「米築株式會社」集合全台最頂尖的編輯群，為讀者提供一手房市資訊，努力發掘台灣優質建築，以及精彩的人物故事，提供讀者多元豐富的閱讀體驗。"/>
    <meta property="og:image" content="http://www.maisonbest.com.tw/images/index/logo.png"/>
    </meta>
    <link rel="shortcut icon" href="/favicon.ico">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">


    <link rel="stylesheet" href="./html1101/css/common.css">
    <link rel="stylesheet" href="./html1101/css/index.css">
    <link rel="shortcut icon" href="img/logo2.svg">
    <title>米築</title>
    <link rel="stylesheet" href="/html1101/css/deco.css">
    @include("fb_code")
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
<!-- 輪播 -->
@include("frontend1101.comm.top_ad")
@include("frontend1101.deco_mobile")
<!-- 新案訊息 -->



<section class="index_casePage container">
    <div class="row">
        <div class="title_row">
            <img src="/html1101/img/case.svg" alt="">
            <h2>新案訊息</h2>
            <span>CASE</span>
        </div>
    </div>

    <iframe src="/frontdemo" width="100%" height="800px" frameborder="0" scrolling="no"></iframe>

    @include("frontend1101.comm.marquee",array("m"=>"m3" , "c_sql"=>$ad_8))
</section>
<!-- 建案廣告 -->
<div class="ad container"  >
    @foreach($ad_8 as $ad8)
        @if(  !empty($ad8->image) AND File::exists( public_path().$ad8->image)  )
            <div class="index_adpic">
                <a href="{{$ad8->url}}" target="_new">
                    <img src="/public{{$ad8->image}}">
                </a>
            </div>
        @endif
    @endforeach
</div>
<!-- 人物觀點 -->
<section class="index_peoplePage">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="index_picBox">
                    <a href="/people2/{{$people->id}}" alt="more">
                        @if(  !empty($people->image) AND File::exists( public_path().$people->image)  )
                            <img src="/public{{$people->image}}" />
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 index_peopleTextbox">
                <div class="title_col">
                    <img src="./html1101/img/people.svg" alt="">
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
                    <img src="./html1101/fake/news02.jpg" alt="新聞" style="max-width: 100%;">
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="title_left">
                    <img src="./html1101/img/news.svg" alt="">
                    <h2>地產動態</h2>
                    <span>NEWS</span>
                    <div class="clear"></div>
                </div>
                <div class="index_newsTextbox">
                    @foreach($posts as $_new)
                        <a href="/f1101/news2/{{$_new->id}}">
                            <div class="textItem">
                                <time datatime="{{$_new->date}}">{{$_new->date}}</time>
                                <div class="index_newsType">今日讀報</div>
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
            <div class="index_picBox"><img src="./html1101/fake/index01.jpg" alt=""></div>
            <div class="index_picBox"><img src="./html1101/fake/index02.jpg" alt=""></div>
            <div class="index_picBox"><img src="./html1101/fake/index03.jpg" alt=""></div>
            <div class="index_picBox"><img src="./html1101/fake/index04.jpg" alt=""></div>
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
                <li>
                    <a href="https://www.instagram.com/p/B1B5ghlJNGW/" target="_blank">
                        <img src="/html1101/fake/ig01.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/p/BtWBuwvlOIz/" target="_blank">
                        <img src="/html1101/fake/ig02.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/p/Bq4CUn7FDZj/" target="_blank">
                        <img src="/html1101/fake/ig01.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/p/B1B5ghlJNGW/" target="_blank">
                        <img src="/html1101/fake/ig02.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/p/BtbGGKLFA2W/" target="_blank">
                        <img src="/html1101/fake/ig01.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/p/B1B5ghlJNGW/" target="_blank">
                        <img src="/html1101/fake/ig02.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/p/BtbGGKLFA2W/" target="_blank">
                        <img src="/html1101/fake/ig01.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/p/BtbGGKLFA2W/" target="_blank">
                        <img src="/html1101/fake/ig02.jpg" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<!--javascript-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
<script src="https://use.fontawesome.com/826a7e3dce.js"></script>

<script src="/js/jquery.flexslider-min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/Crawler.js"></script>

<link rel="stylesheet" type="text/css" href="/css/default_f1101.css">
<!-- javascript -->
<script src="/html1101/js/common.js"></script>
<script>
    if ($(window).width() >= '768') {
        $(".deco-carousel").addClass("owl-carousel");
    }
    marqueeInit({
        uniqueid: 'm',
        style: {
            'width': '100%',
            'height': '120px'
        },
        inc: 5, //speed - pixel increment for each iteration of this marquee's movement
        mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
        moveatleast: 2,
        neutral: 150,
        savedirection: true,
        random: true
    });

</script>

<style>
    @media screen and (min-width: 768px) {
        .case_button_more {
            display: none;
        }
    }
</style>


</body>

</html>
