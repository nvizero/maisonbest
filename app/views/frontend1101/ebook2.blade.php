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
    <title>電子書 | 米築</title>
    @include("fb_code")
</head>

@include("ba")
<body>
	@include("ga_code")
    
    <!-- header start -->
    @include("frontend1101.comm.header") 
    <!-- header end -->
    
    
     
    </div>
    <!-- header end -->
    <!-- 內容 -->
    <section class="container ebook_page">
        <div class="row ebook_title">
            <div class="title_row">
                <img src="/html1101/img/ebook.svg" alt="">
                <h2>電子書 - {{$book->title}}</h2>
                <span>EBOOK</span>
            </div>
        </div>
        <div class="row ebook_content">
            @foreach($bookFiles as $abook)
            <div class="col-6 col-md-3">
                <a href="/{{$abook->file}}">
                    <div class="ebook_card">
                        <div class="ebook_picBox">
                            <img src="/{{$abook->file_pic}}" alt="{{$abook->book_title}}">
                        </div>
                        <div class="ebook_textBox">
                            <h3>{{$abook->book_title}}</h3>
                            <div class="title_time">
                                <i class="far fa-clock"></i>
                                <time datatime="{{$book->cdate}}">{{$book->cdate}}</time>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

             
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
    

    <!--javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/html1101/js/common.js"></script>
</body>

</html>