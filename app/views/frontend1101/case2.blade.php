<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css" integrity="sha512-c7jR/kCnu09ZrAKsWXsI/x9HCO9kkpHw4Ftqhofqs+I2hNxalK5RGwo/IAhW3iqCHIw55wBSSCFlm8JP0sw2Zw==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="/html1101/css/page.css">
    <link rel="shortcut icon" href="/html1101/img/logo.ico">

    <title>{{$case->title}} | 新案訊息 | 米築</title>
	@include("fb_code")

	<meta property="og:title"  content="{{$case->fb_title}} | 新案訊息 | 米築"></meta>
	<meta property="og:type"   content="房屋"></meta>
	<meta property="fb:app_id" content="1325670327461704" /></meta>
	<meta name="description" content="{{$case->title}},{{ms_str($case->content,200)}}" />

	<meta name="title" content="{{$case->title}}" />
	<meta property="og:url" content="{{Request::url()}}" /></meta>
	<meta property="og:site_name" content="米築"></meta>
	<meta property="og:description" content="{{ms_str($case->content,200)}}"></meta>
    <?php
		$r_img = getRateImageType($case->id,'setFB');
	?>
	@if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
		<meta property="og:image" content="http://www.maisonbest.com.tw/public{{$r_img->image}}" /></meta>
	@else
		<meta property="og:image" content="http://www.maisonbest.com.tw/images/index/logo.jpg" /></meta>
	@endif

</head>
	@include("ba")
<body>
@include("ga_code")

     <!-- header start -->
    @include("frontend1101.comm.header")
    <!-- header end -->
    <link rel="stylesheet" href="/joke/css/common.css">
    <link rel="stylesheet" href="/joke/css/page.css">
    <!-- content start-->
    <?php
    $rate_pics = DB::table("rate_pics")
        ->where('rate_id', $case->id)
        ->whereNotIn('name', array("setGoogle", "setList", "setShow", "setFB"))
        ->take(6)
        ->get();
    ?>
    <div class="pageCarousel">
        <div id="container" class="cf">
            <div id="main" role="main">
                <section class="slider">
                    <div class="flexslider fs1">
                        <ul class="slides">


                            @foreach($rate_pics as $pic)
                                @if( !empty($pic->image) AND File::exists(public_path().$pic->image) )
                                    <li>
                                        <img src="/public{{$pic->image}}"/>
                                    </li>
                                @endif
                            @endforeach

{{--                            <li style="overflow:visible;">                                --}}
                            <li style="display: none;">
                                <iframe id="player_1" src="https://player.vimeo.com/video/576367717?api=1&amp;player_id=player_1" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            </li>
                            <!--
                            <li style="display: none;">
                                <a href=""><img src="/joke/fake/car.jpg" /></a>
                            </li>
                            <li style="display: none;">
                                <a href=""><img src="/joke/fake/car.jpg" /></a>
                            </li> -->
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section>
        <!-- 文章內容 -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title_img">
                        <?php
                        $img1=DB::table('rate_pics')->where(['rate_id'=>$case->id , 'name'=>""])->orderBy(DB::raw('RAND()'))->first();
                        ?>
                        <img src="/public{{$img1->image}}" alt="{{$case->title}}" >
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="title ">
                        <h2 class="col-12 col-md-9 title_text ">
                        {{$case->title}}
                        </h2>
                        <div class="col-12 col-md-3 title_link ">
                            <div class="icon ">
                                @if($case->videoLink)
                                    <a href="{{$case->videoLink}}" target="_new" >
                                            <img src="/images/case/icon4.png">
                                    </a>
                                @endif

                                @if($case->vr360Link)
                                    <a href="http://maisonbest.com.tw/360/{{$case->vr360Link}}"  target="_new" >
                                        <img src="/images/case/icon3.png">
                                    </a>
                                @endif
                                <a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent(location.href)) ));"  target="_new" >
                                    <i class="fab fa-facebook-square "></i>
                                </a>
                                <a href="http://line.naver.jp/R/msg/text/?{{$case->title}}%0D%0A{{Request::url()}}" rel="nofollow" >
                                    <i class="fab fa-line "></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="content">
                        {{$case->content}}
                    </div>
                </div>
            </div>
        </div>
        <!--建設公司資訊-->
        <div class="company ">
            <div class="container ">
                <div class="row ">
                    <div class="col-12 col-md-5 company_info ">
                        <h3>{{$case->title}}</h3>
                        @if($case->investment)
                            <span>建設：{{$case->investment}}</span>
                        @endif
                        @if($case->baseArea)
                            <span>基地面積：{{$case->baseArea}}</span>
                        @endif

                        @if($case->floor)
                            <span>	樓層：{{$case->floor}}</span>
                        @endif
                        @if($case->households)
                            <span>戶數：{{$case->households}}</span>
                        @endif

                        @if($case->floorNumber)
                            <span>坪數：{{$case->floorNumber}}</span>
                        @endif
                        @if($case->pattern)
                            <span>格局：{{$case->pattern}}</span>
                        @endif
                        @if($case->postulate)
                                <span>公設比：{{$case->postulate}}</span>
                        @endif

                        @if($case->one_price)
                                <span>單價：{{$case->one_price}}</span>
                        @endif

                        @if($case->total_price)
						<span class="price" style="display:none;">
							<span class="current_price">{{$case->total_price}}</span>
							<div class="as-price as-purchaseinfo-price">
                                <span>
                                        <meta content="{{$case->total_price}}">
                                </span>
                                <span class="as-price-currentprice">
                                        {{$case->total_price}}
                                </span>
                            </div>
						</span>
                		<span class="price">總價：{{$case->total_price}}</span>

                        @endif

                        @if($case->base_address)
                            <span>基地位置：{{$case->base_address}}</span>
                        @endif

                        @if($case->reception)
                            <span>接待中心：{{$case->reception}}</span>
                        @endif

                        @if($case->tel)
                            <span>洽詢電話：
                                <a href="tel:{{$case->tel}}" style="color:blue">{{$case->tel}}</a>
                            </span>
                        @endif

                        @if($case->url && strlen($case->url)>6 )
                            <span>建案網址：
                                <a href="{{$case->url}}" target="_blank">{{$case->url}}</a>
                            </span>
                        @endif

                        @if($case->lineLinkOrg)
                            <span>Line官方建案帳號：
                                <a href="{{$case->lineLinkOrg}}" target="_blank" style="color:blue;">{{$case->lineLinkOrg}}</a>
                            </span>
                        @endif

                        @if($case->data_from)
                            <span>資料來源：
                                {{$case->data_from}}
                            </span>
                        @endif
                    </div>

                    <div class="col-12 col-md-5 company_connect ">
                        <h3>預約賞屋</h3>
                        {{Form::open(array('action' => 'HomeController@report' ,"id"=>"report","enctype"=>"multipart/form-data", 'files' => true  ))}}
                            {{Form::hidden('id' ,$case->id ) }}
                            <input type="text" name="name" id="name" placeholder="@if($errors->first('name')) 姓名必填 @else 姓名 Name @endif" value="">
                            <input type="email" name="email" id="email" placeholder="@if($errors->first('email')) 電子信箱 Email必填 @else 電子信箱 Email @endif" value="">
                            <input type="text" name="people" id="people" placeholder="@if($errors->first('people')) 預約人數 必填 @else 預約人數 @endif" value="">
                            <input type="text" name="phone" id="phone" placeholder="@if($errors->first('phone')) 手機號碼 Phone 必填 @else 手機號碼 Phone @endif" value="">
                            <textarea name="note" id=""  placeholder="若有任何問題，歡迎告訴我們"></textarea>

                            <!-- <input type="text " placeholder="姓名 ">
                            <input type="email " placeholder="信箱 ">
                            <input type="tel " placeholder="手機號碼 ">
                            <input type="text " placeholder="預約人數 ">
                            <textarea name=" " id=" " placeholder="訊息 "></textarea> -->
                            <div class="read ">
                                <input type="checkbox" id="read">
                                <label for="read">
                                    <a class="ico-spr profile">隱私聲明</a>
                               </label>
                            </div>
                            <input type="submit" value="SEND">
                        {{ Form::close() }}
                    </div>

                </div>
            </div>
        </div>
        <!-- google地圖 -->
        <div class="container">
            <div class="map ">
                <iframe src="http://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q={{$case->latitude}},{{$case->longitude}}&z=13&output=embed" width="100%"
                    height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
        <!-- 回上一頁 -->
        <div class="row ">
            <div class="row justify-content-center ">
                <a href="javascript:history.back() " alt="back ">
                    <div class="button_back ">BACK</div>
                </a>
            </div>
        </div>
    </section>
    <!-- content end -->

    <!-- footer end & To Top-->
    <a href="javascript:;">
        <div class="backToTop">
            <i class="fas fa-arrow-up"></i>
        </div>
    </a>
    @include("frontend1101.comm.footer")

    <!--隱私聲明-->
    <div class="modal-login">
        <div class="modal-box">
            <div class="modal-body">
                <h4 class="modal-title">隱私聲明</h4>
                <hr>
                {{$case->statement_content}}
                <a class="modal-close">已閱讀</a>
            </div>
        </div>
    </div>
    <style>
    .content p img {
        max-width: 100% !important;
        height: auto !important;
    }
    </style>



    <!--隱私聲明END-->
    <!--javascript-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="/joke/js/common.js"></script>
    <!-- Syntax Highlighter -->
    <script type="text/javascript" src="/joke/js/shCore.js"></script>
    <script type="text/javascript" src="/joke/js/shBrushXml.js"></script>
    <script type="text/javascript" src="/joke/js/shBrushJScript.js"></script>

    <!-- Optional FlexSlider Additions -->
    <script src="/joke/js/froogaloop.js"></script>
    <script src="/joke/js/jquery.fitvid.js"></script>
    <script src="/joke/js/modernizr.js"></script>
    <script src="/joke/js/demo.js"></script>
    <!-- jQuery -->


    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')
    </script>

    <!-- FlexSlider -->
    <script defer src="/joke/js/jquery.flexslider.js"></script>

    <script type="text/javascript">
        $(window).load(function() {

            // Vimeo API nonsense
            var player = document.getElementById('player_1');
            var player2 = document.getElementById('player_2');
            $f(player).addEvent('ready', ready);

            function addEvent(element, eventName, callback) {
                if (element.addEventListener) {
                    element.addEventListener(eventName, callback, false)
                } else {
                    element.attachEvent(eventName, callback, false);
                }
            }

            function ready(player_id) {
                var froogaloop = $f(player_id);
                froogaloop.addEvent('play', function(data) {
                    $('.flexslider').flexslider("pause");
                });
                froogaloop.addEvent('pause', function(data) {
                    $('.flexslider').flexslider("play");
                });
            }


            // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
            $(".flexslider")
                .fitVids()
                .flexslider({
                    animation: "slide",
                    useCSS: false,
                    animationLoop: false,
                    smoothHeight: true,
                    before: function(slider) {
                        $f(player).api('pause');
                        // $f(player2).api('pause');
                    }
                });
        });
    </script>

    <!-- Syntax Highlighter -->
    <script type="text/javascript" src="/joke/js/shCore.js"></script>
    <script type="text/javascript" src="/joke/js/shBrushXml.js"></script>
    <script type="text/javascript" src="/joke/js/shBrushJScript.js"></script>

    <!-- Optional FlexSlider Additions -->
    <script src="/joke/js/froogaloop.js"></script>
    <script src="/joke/js/jquery.fitvid.js"></script>
    <script src="/joke/js/modernizr.js"></script>
    <script src="/joke/js/demo.js"></script>

</body>

</html>
