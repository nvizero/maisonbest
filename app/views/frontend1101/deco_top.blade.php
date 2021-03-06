<div class="container">
    <div class="row deco_title">
        <div class="title_row">
            <img src="/html1101/img/deco.svg" alt="">
            <h2>生活美學</h2>
            <span>DECO</span>
        </div>
    </div>
</div>
<!-- 手機分區 -->
<section class="deco_content phone">
    <div class="container">
        <div class="row">
            <div class="tax_type">

                <a href="/f1101/deco?type=風格店鋪">
                    <div class="button_more">風格店舖</div>
                </a>
                <a href="/f1101/deco?type=裝潢設計">
                    <div class="button_more">裝潢設計</div>
                </a>
                <a href="/f1101/deco?type=藝文專欄">
                    <div class="button_more">藝文專欄</div>
                </a>
                <a href="/f1101/deco?type=建材百科">
                    <div class="button_more">建材百科</div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="deco_page" >
    <div class="row deco_grid">
        <div class="deco_2rows">
            <?php
            $decos = DB::table('decos')->orderByRaw('RAND()')->take(2)->get();
            foreach($decos as $deco){
            ?>
            <div class="deco_item">
                <a href="/f1101/deco2/{{$deco->id}}">
                    <div class="deco_picBox">
                        <img src="/public{{$deco->image}}" alt="">
                        <div class="picBox_text">
                            <h4>{{$deco->name}}</h4>
                            <div class="title_time">
                                <i class="far fa-clock"></i>
                                <time datatime="<?php echo $deco->created_at;?>"><?php echo $deco->created_at;?></time>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="deco_3rows">
            <?php
            $decos = DB::table('decos')->orderByRaw('RAND()')->take(3)->get();
            foreach($decos as $deco){
            ?>
            <div class="deco_item">
                <a href="/f1101/deco2/{{$deco->id}}">
                    <div class="deco_picBox">
                        <img src="/public{{$deco->image}}" alt="">
                        <div class="picBox_text">
                            <h4>{{$deco->name}}</h4>
                            <div class="title_time">
                                <i class="far fa-clock"></i>
                                <time datatime="<?php echo $deco->created_at;?>"><?php echo $deco->created_at;?></time>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="deco_2rows">
            <?php
            $decos = DB::table('decos')->orderByRaw('RAND()')->take(2)->get();
            foreach($decos as $deco){
            ?>
            <div class="deco_item">
                <a href="/f1101/deco2/{{$deco->id}}">
                    <div class="deco_picBox">
                        <img src="/public{{$deco->image}}" alt="">
                        <div class="picBox_text">
                            <h4>{{$deco->name}}</h4>
                            <div class="title_time">
                                <i class="far fa-clock"></i>
                                <time datatime="<?php echo $deco->created_at;?>"><?php echo $deco->created_at;?></time>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="deco_3rows">
            <?php
            $decos = DB::table('decos')->orderByRaw('RAND()')->take(3)->get();
            foreach($decos as $deco){
            ?>
            <div class="deco_item">
                <a href="/f1101/deco2/{{$deco->id}}">
                    <div class="deco_picBox">
                        <img src="/public{{$deco->image}}" alt="">
                        <div class="picBox_text">
                            <h4>{{$deco->name}}</h4>
                            <div class="title_time">
                                <i class="far fa-clock"></i>
                                <time datatime="<?php echo $deco->created_at;?>"><?php echo $deco->created_at;?></time>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
