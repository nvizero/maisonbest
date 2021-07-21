

<div class="tab-pane active in" id="home">


  <!-- <link href="/jqueryui/jquery-ui.css" rel="stylesheet">
  <script src="/jqueryui/external/jquery/jquery.js"></script>
  <script src="/jqueryui/jquery-ui.js"></script> -->

  @if ($errors->has())
  <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
  </div>
  @endif


  <label>標題</label>
  <input type="text" name="title" value="<?php echo (!empty($result))?$result->title:''?>" class="input-xlarge">

  <label>FB 分享標題</label>
  <input type="text" name="fb_title" value="<?php echo (!empty($result))?$result->fb_title:''?>" class="input-xlarge">

  <label>開啟預約看屋</label>
  <br>
  是
  <input type="radio" class="xm" name="date_to_house" value="1" <?php echo (!empty($result))?($result->date_to_house==1)?" checked":"" :''?>  >
  否
  <input type="radio" class="xm" name="date_to_house" value="0" <?php echo (!empty($result))?($result->date_to_house==0)?" checked":"" :''?> >
  <br>
  <label>專案或聯絡人EMAIL</label>
  <input type="text" name="content_email" value="<?php echo (!empty($result))?$result->content_email:''?>" class="input-xlarge">
  <br>

  <label>預約看屋slogan1</label>
  <input type="text" name="slogan1" value="<?php echo (!empty($result))?$result->slogan1:''?>" class="input-xlarge">
  <br>

  <label>預約看屋slogan2</label>
  <input type="text" name="slogan2" value="<?php echo (!empty($result))?$result->slogan2:''?>" class="input-xlarge">
  <br>

  <label>首頁圖片 - slogan1</label>
  <input type="text" name="image_slogan1" value="<?php echo (!empty($result))?$result->image_slogan1:''?>" class="input-xlarge">
  <br>

  <label>首頁圖片 - slogan2</label>
  <input type="text" name="image_slogan2" value="<?php echo (!empty($result))?$result->image_slogan2:''?>" class="input-xlarge">
  <br>

  <br>

  <label>隱私聲明</label>
  <textarea name="statement_content" rows="8" cols="40" ><?php echo ($result)?$result->statement_content:''?></textarea>

  

  <br>

  <label>首頁顯示</label>
  <br>
  是
  <input type="radio" class="xm" name="xm" value="1" <?php echo (!empty($result))?($result->xm==1)?" checked":"" :''?>  >
  否
  <input type="radio" class="xm" name="xm" value="0" <?php echo (!empty($result))?($result->xm==0)?" checked":"" :''?> >
  <br>
  <br>

  <!-- <label>main</label>
  <select class="" name="choice">
      <option value="address">住址 </option>
      <option value="point">座標 </option>
  </select> -->
  <input type="hidden" name="choice" value="point">

  <label>區域</label>
  <select class="" name="taiwanArea">

    @foreach($areas as $area)
        <option value="{{$area->id}}"
          <?php echo (!empty($result))?( ($result->taiwanArea==$area->id)?" selected ":"" ):''?>
          >
         {{$area->name}}
       </option>
    @endforeach

  </select>

  <br>

  <label>建案網址 </label>  
  <input type="text" name="url" value="<?php echo (!empty($result))?$result->url:''?>"  >

  <label>住址</label>
  <input type="text" name="address" value="<?php echo (!empty($result))?$result->address:''?>"  >

  <label>緯度</label>
  <input type="text" name="latitude" value="<?php echo (!empty($result))?$result->latitude:''?>"  >

  <label>經度</label>
  <input type="text" name="longitude" value="<?php echo (!empty($result))?$result->longitude:''?>"  >

  <label>副標</label>
  <input type="text" name="sub" value="<?php echo (!empty($result))?$result->sub:''?>"  >

  <label>排序</label>
  <input type="text" name="prim" value="<?php echo (!empty($result))?$result->prim:''?>"  >


  <label>地圖標題</label>
  <input type="text" name="googleTitle" value="<?php echo (!empty($result))?$result->googleTitle:''?>"  >

  <label>地圖內容</label>
  <input type="text" name="googleContent" value="<?php echo (!empty($result))?$result->googleContent:''?>"  >


  <div class="row" style="margin:10px;">
    <div class="col-md-3" style="width:100%;float:left;margin:100px 0px 20px 10px;">
        <label style="  font-size: 17px;font-weight: 600;">建案資訊</label>
    </div>
    <div class="col-md-12" style="width:100%;float:left;">
    <?php
    $fields=array("investment"=>"建設","baseArea"=>"基地面積",
                  "floor"=>"樓層","households"=>"戶數",
                  "floorNumber"=>"坪數","pattern"=>"格局",
                  "postulate"=>"公設比","one_price"=>"單價",
                  "total_price"=>"總價","base_address"=>"基地位置",
                  'data_from'=>"資料來源",
                  "reception"=>"接待中心","tel"=>"電話",'lineLinkOrg'=>"官方line連結",
                  'lineLink'=>"line鏈結",
                  'videoLink'=>"影片鏈結",'vr360Link'=>"360鏈結",
                );

    foreach($fields as $key => $value ){
      ?>
      @if($key=="lineLink"   )

        <div class="col-md-3" style="width:100%;float:left;margin:100px 0px 20px 10px;">
            <label style="  font-size: 17px;font-weight: 600;">鏈結輸入</label>
        </div>


       <div class="col-md-3" style="width:47%;float:left;margin:0px 0px 0px 10px;">
         <span>{{$value}}</span>
        <input type="text" name="{{$key}}" value="<?php echo (!empty($result))?$result->$key:''?>"  >
       </div>

       @else

       <div class="col-md-3" style="width:47%;float:left;margin:0px 0px 0px 10px;">
         <span>{{$value}}</span>
         <input type="text" name="{{$key}}" value="<?php echo (!empty($result))?$result->$key:''?>"  >
       </div>
       @endif
   <?php } ?>
   </div>

  </div>




@if(empty($result))
    <label style="color:blue;" >影片</label>
    <input type="file" name="video" >
@else


  <label style="color:blue;" >影片預覧圖</label>

  @if((!empty($result)) ? empty($result->poster) ? false : true  :false )

    <button type="button" class="btn btn-danger del_poster" id="{{$result->id}}" name="button"  >刪除影片預覧圖</button>
    <img src="/public/videos/{{$result->poster}}" alt="" />
  @else
    <input type="file" name="poster" >
  @endif



    @if((!empty($result)) ? (strlen($result->video)>5 ) ? false:true  :false )

      <label style="color:blue;" >影片</label>
      <input type="file" name="video" >



    @else

      <button type="button" class="btn btn-danger del_videl" id="{{$result->id}}" name="button"  >刪除影片</button>
      <video class="slideVideo" width="100%" controls>
          <source src="{{"/public/videos/".$result->video}}" type="video/mp4">
      </video>

    @endif

@endif


  <label style="color:blue;" >圖片</label>
  <span>(限定大小) <br>
    滑動大圖尺寸 <font color=red>寬1000px 高 500px</font>
    <br>
    GOOGLE 縮圖尺寸<font color=red>寬100px 高 100px</font>
    <br>
    列表選單 尺寸<font color=red>寬300px 高 160px</font>
  </span>
  <br>
  <br>


<div class="mainRow">
    <div class="col-md-12" style="margin:0px 0px 0px 40px;">
      <?php

      $googleIms=false;
      $listIms=false;
      $showIms=false;
      $fbIms=false;

      if(!empty($result)){
      $rate_pics=DB::table("rate_pics")->where('rate_id',$result->id)->get();
      ?>

      @foreach($rate_pics as $pic)



          @if($pic->name=="setList")
                  <?php
                  $listIms="/public".$pic->image;
                  ?>
          @elseif($pic->name=="setGoogle")
                  <?php
                  $googleIms="/public".$pic->image;
                  ?>
          @elseif($pic->name=="setFB")
                  <?php
                  $fbIms="/public".$pic->image;
                  ?>
          @elseif($pic->name=="setShow")
                  <?php
                  $showIms="/public".$pic->image;
                  ?>
          @else
          <div   class="showPic">
            <div class="picControl">

                <a href="#" id="{{$pic->id}}"  class="close2"  style="float:left;">
                  <input type="radio" name="name" value="">
                    删除圖片
                </a>

                <br>

                <a  href="#"   id="{{$pic->id}}"  class="setGoogle" >
                  <input type="radio" name="name" value="">
                  設為GOOGLE圖片
                </a>


                <br>

                <a  href="#"    id="{{$pic->id}}"  class="setList"  >
                  <input type="radio" name="name" value=""  >
                  設為列表圖片
                </a>
                <br>
                <a  href="#"    id="{{$pic->id}}"  class="setShow"  >
                  <input type="radio" name="name" value=""  >
                  設為外觀圖片
                </a>

                <br>
                <a  href="#"    id="{{$pic->id}}"  class="setFB"  >
                  <input type="radio" name="name" value=""  >
                  設為FB圖片
                </a>
            </div>

                {{ HTML::image( "/public".$pic->image ,'',array( 'class' => 'img-thumbnail',
                                              "id" => $result->id )) }}
            </div>
          @endif


      @endforeach

      <div style="width:100%;float:left;margin:50px 0px 20px 10px;">

      </div>

        @if($listIms)
        <div   class="showPic" id="setListPic">
          <div class="picControl">
            <span>列表圖片</span>
            {{ HTML::image( $listIms ,'') }}
          </div>
        </div>
        @endif


        @if($googleIms)
        <div   class="showPic" id="setGooglePic">
          <div class="picControl">
            <span>GOOGLE圖片</span>
            {{ HTML::image( $googleIms ,'') }}
          </div>
        </div>
        @endif

        @if($showIms)
        <div   class="showPic" id="setGooglePic">
          <div class="picControl">
            <span>外觀圖片</span>
            {{ HTML::image( $showIms ,'') }}
          </div>
        </div>
        @endif

        @if($fbIms)
        <div   class="showPic" id="setFBPic" >

            <span>FB圖片</span>
            {{ HTML::image( $fbIms ,'') }}

        </div>
        @endif



      <?php } ?>
    </div>
</div>
<br>
<br>

<br>
<br>
<br>
<br>





    <div style="width:100%;float:left;margin:200px 0px 20px 10px;">

    </div>

    {{ Form::file('images[]', array('multiple'=>true)) }}


  <label>內容</label>
  <textarea name="content" rows="8" cols="40" ><?php echo ($result)?$result->content:''?></textarea>


<style media="screen">



  label{
    font-size: 20px;
    font-weight: 600;
    margin: 8px 0px 8px 0px;
  }

  .showPic{
    width:22%;
    float:left;
    margin:20px 10px 0px 5px;
    padding:10px;
  }

  .mainRow{
    width: 100%;
    float: left;
  }

  .picControl{
    height: 100px;
  }

  .showPic img{
    width: 100%;
    height: auto;
  }

  #setGooglePic img{

    border-style: solid;
    border-width: 2px 10px 4px 20px;
  }
</style>
</div>






<script type="text/javascript">
$("document").ready(function(){
      // $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
      $(".setShow").click(function(){
        var html = $(this);
        var pic_id = html.attr('id') ;
        var r = confirm("確定要設定為外觀圖片!?");
        if (r == true) {

          $.post("/setShowImage",
                {"id":pic_id},
                function(data){
                  // alert(data);
                  if(data==1){
                      alert("設定成功!");
                      location.reload();
                  }


              });
        }
      });



      $(".setGoogle").click(function(){
        var html = $(this);
        var pic_id = html.attr('id') ;
        var r = confirm("確定要設定為GOOLGE MAP圖片!?");
        if (r == true) {

          $.post("/setGoogleImage",
                {"id":pic_id},
                function(data){
                  // alert(data);
                  if(data==1){
                      alert("設定成功!");
                      location.reload();
                  }


              });
        }
      });

      $(".setFB").click(function(){
        var html = $(this);
        var pic_id = html.attr('id') ;
        var r = confirm("確定要設定為FB圖片!?");
        if (r == true) {

          $.post("/setFBImage",
                {"id":pic_id},
                function(data){
                  // alert(data);
                  if(data==1){
                      alert("設定成功!");
                      location.reload();
                  }


              });
        }
      });


      $(".setList").click(function(){
        var html = $(this);
        var pic_id = html.attr('id') ;
        var r = confirm("確定要設定為列表圖片!?");
        if (r == true) {

          $.post("/setListImage",
                {"id":pic_id},
                function(data){
                  // alert(data);
                  if(data==1){
                      alert("設定成功!");
                      location.reload();
                  }


              });
        }

      });


      $("#xm").click(function(){

          // alert(  $(this).prop("checked" ) );
          var rate_id =  $(this).val()   ;
          // alert(rate_id);

          $.post("/selectRate",
                {"id":rate_id },
                function(data){
                  // alert(data)
                  if(data==1){
                       alert('修改成功');
                  }else{
                        $("#xm").prop("checked", false);
                       alert('失敗,上限是5則顯示在前台');
                  }
                  // alert('成功');
              });
      });


      // $("button.del_videl").click(function(){
      //
      // })

      $("button.del_videl").click(function(){

        var rate_id = $(this).attr('id');

        // alert(rate_id);

        var r = confirm("確定刪除影片!?");

        if (r == true) {

          $.post("/delRateVideo",
                {"id":rate_id},
                function(data){
                  // alert(data);
                  if(data==1){
                      alert("删除成功!");
                      location.reload();
                  }else{
                      alert("删除失敗!");
                  }


              });
        }

      });

      $("button.del_poster").click(function(){

        var rate_id = $(this).attr('id');

        // alert(rate_id);

        var r = confirm("確定刪除影片預覧圖!?");

        if (r == true) {

          $.post("/delRatePoster",
                {"id":rate_id},
                function(data){
                  // alert(data);
                  if(data==1){
                      alert("删除成功!");
                      location.reload();
                  }else{
                      alert("删除失敗!");
                  }


              });
        }

      });

      $("a.close2").click(function(){
            var html = $(this);
            var pic_id = html.attr('id') ;
            // $(this).clone().appendTo('.clone');
            // alert(pic_id);
            var r = confirm("確定刪除圖片!?");
            if (r == true) {

              $.post("/delRateImage",
                    {"id":pic_id},
                    function(data){
                      // alert(data);
                      if(data==1){
                          alert("删除成功!");
                          location.reload();
                      }


                  });
            }

      });

});
</script>
