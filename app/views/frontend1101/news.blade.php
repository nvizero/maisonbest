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
    <title>地產動態 | 米築</title>
    <meta name="description" content="帶給您最新的房室第一手消息！" />

</head>

<body>
    <!-- header start -->
    @include("frontend1101.comm.header")
    <!-- header end -->
    <!-- 輪播 -->
    @include("frontend1101.comm.top_ad")
    <!-- 新聞列表 -->
    <div class="container">
        <div class="row news_title">
            <div class="title_row">
                <img src="/html1101/img/news.svg" alt="">
                <h2>地產動態</h2>
                <span>NEWS</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row tax_type">
            <a href="/news" alt="全部">
                <div class="button_more">全部</div>
            </a>
            <?php
            $type_decos=['地產新聞' ,'今日讀報','房市觀點' ];

            foreach($type_decos as $type_name){

                    echo '<a href=/news?cate='.$type_name.' alt="">';
                        echo '<div class="button_more">'.$type_name.'</div>';
                    echo '</a>';

            }
            ?>
        </div>
    </div>
    <section class="news_content">
        <div class="container">
            <div class="row ">
                @foreach($posts as $post)
                <div class="news_report">
                    <div class="col-md-6 news_picBox">
                        @if( !empty($post->image) AND File::exists(public_path().$post->image) )
                            <img src="/public{{$post->image}}">
                        @else
                            <img src="{{$bgs[$bgi]}}">
                        @endif
                    </div>
                    <div class="col=md-4 news_textBox">
                        <div class="news_itemTitle">{{$post->cate}}！</div>
                        <div class="news_itemsub">{{$post->name}}</div>
                        <div class="title_time">
                            <i class="far fa-clock"></i>
                            <time datatime="{{$post->date}}">{{$post->date}}</time>
                        </div>
                        <div class="news_itemCon">
                            <p>{{ms_str_news($post->content,200) }}</p>
                        </div>
                        <a href="/news2/{{$post->id}}" alt="more">
                            <div class="button_more">MORE</div>
                        </a>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
        <div class="row news_more">
            <div class="container ">
                <div class="title_row">
                    <h4>想看更多新聞</h4>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        @foreach($rando1_posts as $post )
                        <a href="/news2/{{$post->id}}">
                            <div class="news_moreitem">
                                <img src="/html1101/img/search.png" alt="">
                                <div>
                                    <div class="news_itemTitle">{{$post->name}}</div>
                                    <div class="title_time">
                                        <i class="far fa-clock"></i>
                                        <time datatime="{{$post->date}}">{{$post->date}}</time>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="col-12 col-md-6">
                        @foreach($rando2_posts as $post )
                            <a href="/news2/{{$post->id}}">
                                <div class="news_moreitem">
                                    <img src="/html1101/img/search.png" alt="">
                                    <div>
                                        <div class="news_itemTitle">{{$post->name}}</div>
                                        <div class="title_time">
                                            <i class="far fa-clock"></i>
                                            <time datatime="{{$post->date}}">{{$post->date}}</time>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

            <div class="row pageNumber">
                <?php echo with(new CustomPresenter($posts))->render(); ?>
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

    <script src="/js/Crawler.js"></script>
    <script>


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
</body>
</html>
