<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <link rel="stylesheet" href="/html1101/css/common.css">
    <link rel="stylesheet" href="/html1101/css/deco.css">
    <link rel="shortcut icon" href="/html1101/img/logo.ico">
    <title>生活美學 | 米築</title>
</head>

<body>
    <!-- header start -->
    @include("frontend1101.comm.header")
    <!-- header end -->
    <!-- 輪播 -->
    @include("frontend1101.comm.top_ad")
    <!-- 方格排版 -->
    @include("frontend1101.deco_top")

    <section class="deco_content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9">
                    @foreach($decos as $deco)
                    <a href="/deco2/{{$deco->id}}">
                        <div class="deco_conItem">
                            <div class="col-12 col-md-6 deco_picBox">
                            @if(  !empty($deco->image) AND File::exists( public_path().$deco->image)  )
                                <img src="/public{{$deco->image}}" />
                            @endif
                            </div>

                            <div class="col-12 col-md-6 textBox">
                                <h3>{{$deco->name}}</h3>
                                <div class="title_time">
                                    <i class="far fa-clock"></i>
                                    <time datatime="<?php echo $deco->created_at;?>"><?php echo $deco->created_at;?></time>
                                </div>
                                <p>{{ ms_str($deco->content,300) }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach


                </div>
                <div class="col-md-3">
                    <div class="deco_bar">
                        <div class="deco_barTitle">FOLLOW US</div>
                        <div class="deco_barCon">
                            <div class="icon">
                                <a href="https://www.facebook.com/maisonbest/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                <a href="https://lin.ee/n9vcOPz" target="_blank"><i class="fab fa-line"></i></a>
                                <a href="https://www.instagram.com/maisonbesttw/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="deco_barTitle">TAG</div>
                        <div class="deco_barCon">


                            <a href="/deco?type=風格店鋪">
                                <div class="deco_tag">風格店鋪</div>
                            </a>
                            <a href="/deco?type=裝潢設計">
                                <div class="deco_tag">裝潢設計</div>
                            </a>
                            <a href="/deco?type=建材百科">
                                <div class="deco_tag">建材百科</div>
                            </a>
                            <a href="/deco?type=藝文專欄">
                                <div class="deco_tag">藝文專欄</div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 更多文章 -->
        <div class="phone">
            <div class="row news_more">
                <div class="container ">
                    <div class="title_row">
                        <h4>想看更多文章</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <?php
                            $decos = Deco::orderBy("prim","asc")->paginate(5);
                            ?>
                            @foreach($decos as $deco)
                            <a href="/desc/{{$deco->id}}">
                                <div class="news_moreitem">
                                    <img src="/html1101/img/search.png" alt="">
                                    <div>
                                        <div class="news_itemTitle">{{$deco->name}}</div>
                                        <div class="title_time">
                                            <i class="far fa-clock"></i>
                                            <time datatime="<?php echo explode(' ',$deco->created_at)[0];?>"><?php echo explode(' ',$deco->created_at)[0];?></time>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>

            <div class="row pageNumber">
                <?php echo with(new CustomPresenter($decos))->render(); ?>
            </div>
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
