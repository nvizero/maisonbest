<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <link rel="stylesheet" href="/html1101/css/common.css">
    <link rel="stylesheet" href="/html1101/css/page.css">
    <link rel="shortcut icon" href="/html1101/img/logo.ico">
    <title>{{$post->name}} | 地產動態 | 米築</title>
</head>

<body>
    <!-- header start -->

    @include("frontend1101.comm.header")
    <!-- header end -->
    <!-- content start-->
    <section class="container">
        <!-- 文章內容 -->
        <div class="row">
            <div class="col-12">
                <div class="title_img">
                    <img src="/fake/news_bg.jpg" alt="">
                </div>
            </div>
            <div class="col-12">
                <div class="title">
                    <h2 class="col-12 col-md-9 title_text">
                    {{$post->name}}
                    </h2>
                    <div class="col-12 col-md-3 title_link">
                        <div class="title_time">
                            <i class="far fa-clock"></i>
                            <time datatime="2020-08-03">{{$post->date}}</time>
                        </div>
                        <div class="icon">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="intro">
                {{$post->content}}
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
    <a href="javascript:;">
        <div class="backToTop">
            <i class="fas fa-arrow-up"></i>
        </div>
    </a>

    @include("frontend1101.comm.footer")
    <!-- footer end & To Top-->

    <!--javascript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/common.js"></script>
    <style>
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
</body>

</html>
