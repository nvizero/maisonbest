<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <link rel="stylesheet" href="/html1101/css/common.css">
    <link rel="shortcut icon" href="/html1101/img/logo.ico">
    <title>關於米築 | 米築</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="米築取自於法文的「Maison」，做為名詞為「家」之意，當成形容詞則是「獨門的」，所以我們將兩者合一，並以時尚、質感為主軸，建構全台灣最獨特的房地產網站─米築株式會社。"></meta>
    @include("fb_code")
</head>

@include("ba")
<body>
	@include("ga_code")
    
    <!-- header start -->
    @include("frontend1101.comm.header") 
    <!-- header end -->
    <!-- 輪播 -->
    @include("frontend1101.comm.top_ad")
    <!-- 新聞列表 --> 
    <!-- 內容 -->
    <section class="container about_page">
        <div class="row about_title">
            <div class="title_row">
                <img src="/html1101/img/logo.svg" alt="">
                <h2>關於米築</h2>
                <span>ABOUT</span>
            </div>
        </div>
        <div class="row justify-content-center about_content">
            {{$post->content}}
        </div>
    </section>

    <!-- footer end & To Top-->
    <a href="javascript:;">
        <div class="backToTop">
            <i class="fas fa-arrow-up"></i>
        </div>
    </a>
    <!-- footer start -->
    @include("frontend1101.comm.footer") 
    <!-- footer end & To Top-->

    <!--javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/html1101/js/common.js"></script>
</body>

</html>