<section class="title_carousel">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators" style="z-index: 2;">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php
            foreach($ad_12 as $k => $atop8){
            ?>
            @if(  !empty($atop8->image) AND File::exists( public_path().$atop8->image)  )
                <div class="carousel-item @if($k==0 ) active @endif">
                    <a href="{{$atop8->url}}" target="_new" >
                        <img class="d-block car_width" src="/public{{$atop8->image}}" >
                    </a>
                </div>
            @endif
            <?php
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="z-index: 3;">
            <span>‹</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="z-index: 3;">
            <span>›</span>
        </a>
    </div>
</section>


<style type="text/css">
    .carousel-inner .carousel-item , .carousel-indicators{
        cursor: pointer;
    }
</style>
