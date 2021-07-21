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
    <link rel="shortcut icon" href="/html1101/img/logo.ico">
    @include("ba")
    <title>人物觀點 | 米築</title>
    <meta name="description" content="米築獨家人物專訪，舉凡建商大老、代銷大頭、建築師、設計師等，精彩人物故事，絕不能錯過！"></meta>
    <meta property="og:type" content="人物觀點"></meta>
    <meta property="fb:app_id" content="1325670327461704"/>
    <meta property="og:site_name" content="米築"></meta>

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

<!-- 內容 -->
<section class="people_content">
    <div class="container">
        <div class="row people_title">
            <div class="title_row">
                <img src="/html1101/img/people.svg" alt="">
                <h2>人物觀點</h2>
                <span>PEOPLE</span>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row tax_type">
            <a href="/case" alt="全部">
                <div class="button_more">全部</div>
            </a>
            <?php
            foreach ($peoples as $type_row) {
                if ($type_row->title != '') {

                    echo '<div class="button_more" id="pointer_to">' . $type_row->title . '</div>';

                }
            }
            ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php $iiccco = 1;?>
            @foreach($peoples as $people)
                @if($iiccco %2==0)
                    <div class="people_build people_to">
                        <div class="col-12 col-md-6">
                            <div class="people_picBox">
                                @if( !empty($people->image) AND File::exists(public_path().$people->image) )
                                    <img src="/public{{$people->image}}" alt="人物觀點">
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6 people_textBox">
                            <div class="title_col">
                                <h3>{{$people->title}}</h3>
                            </div>
                            <div class="people_item align-self-end">
                                <div class="type_title"><span>{{$people->name}}</span></div>
                                <p>{{ms_str($people->content,200) }}</p>
                                <a href="/people2/{{$people->id}}" alt="more">
                                    <div class="button_more">MORE</div>
                                </a>
                            </div>
                        </div>
                    </div>

                @else

                    <div class="people_build  people_reverse people_to">
                        <div class="col-12 col-md-6 people_textBox">
                            <div class="title_col">
                                <h3>{{$people->title}}</h3>
                            </div>
                            <div class="people_item align-self-end">

                                <div class="type_title"><span>{{$people->name}}</span></div>
                                <p>{{ms_str($people->content,200) }}</p>
                                <a href="/people2/{{$people->id}}" alt="more">
                                    <div class="button_more">MORE</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="people_picBox">
                                @if( !empty($people->image) AND File::exists(public_path().$people->image) )
                                    <img src="/public{{$people->image}}" alt="人物觀點">
                                @endif

                            </div>
                        </div>
                    </div>
                @endif
                <?php $iiccco = $iiccco + 1;?>

            @endforeach

        </div>
    </div>
    <style>
        .tax_type .button_more {
            cursor: pointer;
            width: auto;
            padding: 0 15px;
            margin: 10px;
        }
    </style>
    <div class="row pageNumber">
        <?php echo with(new CustomPresenter($peoples))->render(); ?>
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
<!-- footer end & To Top-->

<!--javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
{{--    <script src="/html1101/js/common.js"></script>--}}

<script>
    $("document").ready(function () {

        $("#pointer_to:eq(0)").click(function(){
            $("html , body").animate({
                "scrollTop": $(".people_to:eq(0)").offset().top -2
            });
        });

        $("div#pointer_to:eq(1)").click(function(){
            $("html , body").animate({
                "scrollTop": $(".people_to:eq(1)").offset().top -10
            });
        });

        $("div#pointer_to:eq(2)").click(function(){
            $("html , body").animate({
                "scrollTop": $(".people_to:eq(2)").offset().top -80
            });
        });

        $("div#pointer_to:eq(3)").click(function(){
            $("html , body").animate({
                "scrollTop": $(".people_to:eq(3)").offset().top -150
            })
        });

        $("div#pointer_to:eq(4)").click(function(){
            $("html , body").animate({
                "scrollTop": $(".people_to:eq(4)").offset().top -190
            })
        });
    });
</script>
</body>

</html>
