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
    <title>搜尋 | 米築</title>
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

     

    <div id="main">
		<div class="sub_main">
			@if($result_post)
					@foreach($result_post as $post)
		        <div class="result">
								<a href="/f1101/news2/{{$post->id}}?color=brown">
				            <span class="tit">地產動態-{{$post->name}}</span>
				            <img src="/images/search/tri.png">
				            <p>{{ms_str($post->content,500)}}(繼續閱讀)</p>
										<span class="cnt">{{$post->created_at}}</span>
								</a>
		        </div>
					@endforeach
			@endif

			@if($result_people)
					@foreach($result_people as $people)
		        <div class="result">
								<a href="/f1101/people2/{{$people->id}}">
				            <span class="tit">人物觀點-{{$people->name}}</span>
				            <img src="/images/search/tri.png">
				            <p>{{ms_str($people->content,500)}}(繼續閱讀)</p>
										<span class="cnt">{{$people->created_at}}</span>
								</a>
		        </div>
					@endforeach
			@endif


			@if($result_rate)
					@foreach($result_rate as $rate)
		        <div class="result">
								<a href="/f1101/case2/{{$rate->id}}">
				            <span class="tit">新案訊息-{{$rate->title}}</span>
				            <img src="/images/search/tri.png">
				            <p>{{ms_str($rate->content,500)}}(繼續閱讀)</p>
										<span class="cnt">{{$rate->created_at}}</span>
								</a>
		        </div>
					@endforeach
			@endif

			@if($result_deco)
					@foreach($result_deco as $deco)
		        <div class="result">
								<a href="/f1101/deco2/{{$deco->id}}">
								<span class="tit">生活美學-{{$deco->name}}</span>
				            <img src="/images/search/tri.png">
				            <p>{{ms_str($deco->content,500)}}(繼續閱讀)</p>
										<span class="cnt">{{$deco->created_at}}</span>
								</a>
		        </div>
					@endforeach
			@endif

			</div>	
			 
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
	<style>
		.tit{
			color:blue;
		}

		.cnt{
			color:#0000ff40;
		}
		.result{
			display:flex;
		}
		.sub_main{
			width: 90%;
			display: flex;
			flex-direction: column;
		}
		#main{
			flex: auto;
			display: flex;
			justify-content: center;
			justify-items: start;
		}
		.result {
			display: flex;
			flex-direction: row;
		}
	</style>
    <!--javascript-->
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/html1101/js/common.js"></script>
</body>

</html>