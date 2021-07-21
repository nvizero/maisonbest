<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"
          integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <link rel="stylesheet" href="/html1101/css/common.css">
    <link rel="stylesheet" href="/html1101/css/page.css">
    <link rel="shortcut icon" href="/html1101/img/logo.ico">
    <title>{{$people->title}} | 人物觀點 | 米築</title>

    <meta property="og:title" content="{{$people->fb_title}}"></meta>
    <meta property="og:type" content="人物觀點"></meta>
    <meta name="description" content="{{ms_str($people->content,200)}}"/>

    <meta property="fb:app_id" content="1325670327461704"/>


    <meta property="og:url" content="{{Request::url()}}"></meta>
    <meta property="og:site_name" content="米築"></meta>
    <meta property="og:description" content="{{ms_str($people->content,200)}}"></meta>

    @if( !empty($people->image_facebook) AND File::exists(public_path().$people->image_facebook) )
        <meta property="og:image" content="http://www.maisonbest.com.tw/public{{$people->image_facebook}}"></meta>
    @else
        <meta property="og:image" content="http://www.maisonbest.com.tw/images/index/logo.png"/></meta>
    @endif
    <?php
    try {

        $html = new \Htmldom($people->content);
        foreach ($html->find('img') as $element) {
            echo '<meta property="og:image" content="http://www.maisonbest.com.tw/public' . $element->src . '" ></meta>';
        }

    } catch (Exception $e) {
        echo '<meta property="og:image" content="http://www.maisonbest.com.tw/public' . $people->image2 . '" ></meta>';
    }

    ?>

    @include("fb_code")
</head>

@include("ba")
<body>
@include("ga_code")
<!-- header start -->
@include("frontend1101.comm.header")
<!-- header end -->

<!-- content start-->
<section class="container">
    <!-- 文章內容 -->
    <div class="row">
        <div class="col-12">
            <div class="title_img">
                <img src="/public{{$people->image}}" alt="">
            </div>
        </div>
        <div class="col-12">
            <div class="title">
                <h2 class="col-12 col-md-9 title_text">
                    {{$people->name}} | {{$people->title}} | {{$people->tag}}
                </h2>
                <div class="col-12 col-md-3 title_link">
                    <div class="title_time">
                        <i class="far fa-clock"></i>
                        <time datatime="2020-08-03"></time>
                    </div>
                    <div class="icon">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="content">
                {{$people->content}}
            </div>
        </div>
    </div>
    <!-- 回上一頁 -->
    <div class="row">
        <div class="row justify-content-center content_back">
            <a href="javascript:history.back()" alt="back">
                <div class="button_back">BACK</div>
            </a>
        </div>
    </div>
</section>
<!-- content end -->
<!-- footer end & To Top-->
<!-- footer start -->
@include("frontend1101.comm.footer")
<!-- footer end & To Top-->
<!-- footer end & To Top-->

<!--javascript-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="/html1101/js/common.js"></script>
<style>
    .content p img {
        min-width: 100% !important;
        max-width: 100% !important;
        height: auto !important;
    }

    .intro p img {
        max-width: 100% !important;
        height: auto !important;
    }

    a, a:focus, a:active, a:hover, object, embed {
        outline: none;
        text-decoration: none;
        color: #000;
    }


</style>
<script>
    $("document").ready(function(){
        $(".content p img").css("")
    });
</script>
</body>

</html>
