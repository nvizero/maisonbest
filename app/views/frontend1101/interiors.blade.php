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
    @include("ba")
    <title>室內設計 | 米築</title>
    <meta name="description" content="米築獨家人物專訪，舉凡建商大老、代銷大頭、建築師、設計師等，精彩人物故事，絕不能錯過！"></meta>
    <meta property="og:type" content="室內設計"></meta>
    <meta property="fb:app_id" content="1325670327461704" />
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
                    <img src="/html1101/img/interior.svg" alt="">
                    <h2>室內設計</h2>
                    <span>INTERIOR</span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php $i=1;?>
                @foreach($interiors as $interior)
                    @if($i%2==1)
                    <div class="people_build">
                        <div class="col-12 col-md-6">
                            <div class="people_picBox">
                                @if( !empty($interior->image) AND File::exists(public_path().$interior->image) )
                                    <img src="/public{{$interior->image}}"  alt="{{$interior->title}}">
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6 people_textBox">
                            <div class="title_col">
                                <h3>{{$interior->title}}</h3>
                            </div>
                            <div class="people_item align-self-end">
                                <div class="type_title_e"><span>{{$interior->name}}</span></div>
                                <p>{{ms_str($interior->content,200) }}</p>
                                <a href="/interior2/{{$interior->id}}" alt="more">
                                    <div class="button_more">MORE</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="people_build people_reverse">
                            <div class="col-12 col-md-6 people_textBox">
                                <div class="title_col">
                                    <h3>{{$interior->title}}</h3>
                                </div>
                                <div class="people_item align-self-end">
                                    <div class="type_title_e"><span>{{$interior->name}}</span></div>
                                    <p>{{ms_str($interior->content,200) }}</p>
                                    <a href="/interior2/{{$interior->id}}" alt="more">
                                        <div class="button_more">MORE</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="people_picBox">
                                    @if( !empty($interior->image) AND File::exists(public_path().$interior->image) )
                                        <img src="/public{{$interior->image}}"  alt="{{$interior->title}}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                <?php $i=$i+1; ?>
                @endforeach




            </div>
        </div>
        <div class="row pageNumber">
            <?php echo with(new CustomPresenter($interiors))->render(); ?>
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
