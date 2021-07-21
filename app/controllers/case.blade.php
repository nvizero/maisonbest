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
    <title>新案資訊 | 米築</title>
    @if($cases->count()!=0)
        <meta property="og:title" content="{{$cases[0]->title}}"></meta>
        <meta property="og:type" content="房屋"></meta>
        <meta property="fb:app_id" content="1325670327461704"/>
        <meta property="og:url" content="{{Request::url()}}"></meta>
        <meta property="og:site_name" content="米築"></meta>

        <meta property="og:description" content="{{ms_str($cases[0]->content,200)}}"></meta>
        <?php
        $o_img = getRateImageType($cases[0]->id, 'setList');
        ?>
        @if(  !empty($o_img->image) AND File::exists( public_path().$o_img->image)  )
            <meta property="og:image" src="/public{{$o_img->image}}"></meta>
        @endif
    @endif
    <meta name="description" content="最新預售屋、新成屋資訊、最完整的建案剖析，為您掌握一手房市訊息！"></meta>

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
<!-- 方格排版 -->
<div class="container">
    <div class="row case_title">
        <div class="title_row">
            <img src="/html1101/img/case.svg" alt="">
            <h2>新案訊息</h2>
            <span>CASE</span>
        </div>
    </div>
</div>

<div class="container">
    <div class="row tax_type">
        <a href="/f1101/case" alt="全部">
            <div class="button_more">全部</div>
        </a>
        <?php
        $areas = DB::table('rate_areas')->where('flag', 1)->get();
        foreach ($areas as $area) {

            echo '<a href="/f1101/case?taiwanArea=' . $area->id . '" alt="">';
            echo '<div class="button_more">' . $area->name . '</div>';
            echo '</a>';
        }

        ?>

    </div>
</div>
<section class="case_content">
    <div class="container">

        <div class="row ">
            @foreach($cases as $case)
                <div class="col-12 col-md-3 case_Page_item">
                    <a href="/f1101/case2/{{$case->id}}">
                        <?php
                        $r_img = getRateImageType($case->id, 'setList');
                        ?>
                        @if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
                            <div class="case_picBox"><img src="/public{{$r_img->image}}" alt="{{$case->title}}"></div>
                        @else
                            <img src="images/case/case1.jpg">
                        @endif
                        <div class="case_cardBox">
                            <h4>{{$case->title}}</h4>
                            <span>{{$case->image_slogan1}}</span>
                            <span>{{$case->image_slogan2}}</span>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
        <div class="row pageNumber">
            <?php echo with(new CustomPresenter($cases))->render(); ?>
            <?php // echo with(new CustomPresenter($cases->appends(array('taiwanArea' => $taiwanArea)) ))->render(); ?>


        </div>
    </div>
</section>

<!-- 建案廣告 -->
<div class="ad container">
    @foreach($case_ad as $case)
        <div class="case_adpic">
            <a href="/f1101/case2/{{$case->id}}">
                <?php
                $r_img = getRateImageType($case->id, 'setList');
                ?>
                @if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
                    <img src="/public{{$r_img->image}}" alt="{{$case->title}}">
                @else
                    <img src="images/case/case1.jpg">
                @endif


            </a>
        </div>
    @endforeach

</div>

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
<style>
    @media (min-width: 1200px) {
        .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 91%;
        }
    }
</style>
</body>

</html>
