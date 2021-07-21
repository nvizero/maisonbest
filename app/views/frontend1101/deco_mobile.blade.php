<section class="index_decoPage">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 index_decoPage_left">
                <div class="phone owl-carousel">
                    <?php
                    $decos = DB::table('decos')->orderByRaw('RAND()')->take(5)->get();
                    foreach($decos as $deco){
                    ?>
                    <a href="/f1101/deco2/{{$deco->id}}">
                        <div class="index_picBox index_img6043">
                            <img src="/public{{$deco->image}}" alt="">
                            <div class="title_left">
                                <img src="/fake/img/deco.svg" alt="">
                                <h2>生活美學</h2>
                                <span>DECO</span>
                                <div class="clear"></div>
                            </div>
                            <div class="picBox_text">
                                <h4>{{$deco->name}}</h4>
                                <div class="title_time">
                                    <i class="far fa-clock"></i>
                                    <time datatime="<?php echo $deco->created_at;?>"><?php echo $deco->created_at;?></time>
                                </div>
                                <p>{{ms_str($deco->content)}}</p>
                            </div>
                        </div>
                    </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="computer">
                    <?php
                    $decos = DB::table('decos')->orderByRaw('RAND()')->take(2)->get();
                    foreach($decos as $deco){
                    ?>
                    <a href="/f1101/deco2/{{$deco->id}}">
                        <div class="index_picBox index_img6043">
                            <img src="/public{{$deco->image}}" alt="">
                            <div class="picBox_text">
                                <p>{{$deco->name}}</p>
                                <div class="title_time">
                                    <i class="far fa-clock"></i>
                                    <time datatime="<?php echo $deco->created_at;?>"><?php echo $deco->created_at;?></time>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                    }
                    ?>
                </div>

            <?php
            $decoOne = DB::table('decos')->orderByRaw('RAND()')->take(1)->first();
            ?>
                <div class="index_deco_textBox computer">
                    <div class="title_left">
                        <img src="/fake/img/deco.svg" alt="">
                        <h2>生活美學</h2>
                        <span>DECO</span>
                        <div class="clear"></div>
                    </div>
                    <p>{{ms_str($decoOne->content)}}</p>
                </div>
            </div>

            <div class="col-12 col-md-7 index_decoPage_right">
                <a href="/f1101/deco2/{{$decoOne->id}}">
                    <div class="index_picBox index_img8090">
                        <img src="/public{{$decoOne->image}}" alt="">
                        <div class="picBox_text">
                            <p>{{$decoOne->name}}</p>
                            <div class="title_time">
                                <i class="far fa-clock"></i>
                                <time datatime="<?php echo $decoOne->created_at;?>"><?php echo $decoOne->created_at;?></time>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
