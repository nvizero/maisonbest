  <div class="tab-pane active in" id="home">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif







  <label>標題</label>
  <input type="text" name="name" value="<?php echo (!empty($post))?$post->name:''?>" class="input-xlarge">

  <label>FB標題</label>
  <input type="text" name="fb_title" value="<?php echo (!empty($post))?$post->fb_title:''?>" class="input-xlarge">

  <label>分類</label>
  <input type="text" name="type" value="<?php echo (!empty($post))?$post->type:''?>" class="input-xlarge">

<br>
      <label>前台顯示</label>
      是
      <input type="radio" class="flag" name="flag" value="1" <?php echo (!empty($post))?($post->flag==1)?" checked":"" :''?>  >
      否
      <input type="radio" class="flag" name="flag" value="0" <?php echo (!empty($post))?($post->flag==0)?" checked":"" :''?> >
<br><br>
  <label >排序</label>
  <input type="text" name="prim"     value="<?php echo (!empty($post))?$post->prim:''?>" class="input-xlarge">

            <label>圖片</label>
            <font style="color:red;">圖片檔案為_尺寸寬900px高400px</font>
            <br>
            @if(!empty($post) && $post->image)


                <input  type="button" class="btn btn-danger del-image" id="{{$post->id}}"   style="float:left;"  value="刪除列表圖片">
                <br>
                <br>
                {{ HTML::image( "/public".$post->image , '' , array( 'class' => 'img-thumbnail',
                                                          "id" => $post->id ,
                                                          'style' =>  "width:200px;height:190px;")) }}





            @else
              <input type="file" name="image" value="" class="input-xlarge">
            @endif

            <div class="" style="margin:100px 0px">

            </div>
              <label>FB圖片</label>
            @if(!empty($post) && $post->fb_image )


                <input type="button" class="btn btn-danger del-fb-image" id="{{$post->id}}"  value="刪除FB圖片">
                <br>
                <br>

                {{ HTML::image( "/public".$post->fb_image , '' , array(
                                                            'class' => 'img-thumbnail',
                                                            "id" => $post->id ,
                                                            'style' =>  "width:200px;height:190px;")  ) }}





            @else
              <input type="file" name="fb_image" value="" class="input-xlarge">
            @endif

  <input type="hidden" name="category_id" value="4" >




  <div class="row" style="margin:10px;">

    <div class="col-md-12" style="width:100%;float:left;">
    <?php
    $fields=array(
                  // 'lineLink'=>"line鏈結",
                  'videoLink'=>"影片鏈結",'vr360Link'=>"360鏈結",
                );

    foreach($fields as $key => $value ){
      ?>
       <div class="col-md-3" style="width:30%;float:left;margin:0px 0px 0px 10px;">
         <label>{{$value}}</label>
        <input type="text" name="{{$key}}" value="<?php echo (!empty($post))?$post->$key:''?>"  >
       </div>
   <?php } ?>
   </div>

  </div>


  <label>內容</label>
  <textarea name="content" rows="8" cols="40" id="ckeditor" class="ckeditor" ><?php echo ($post)?$post->content:''?></textarea>

</div>






<style media="screen">
  label{
    font-size: 20px;
    font-weight: 600;
    margin: 8px 0px 8px 0px;
  }
</style>


<script type="text/javascript">
$("document").ready(function(){

  // $("button.close2").click(function(){
  //
  //       $('.user_id').attr('id' , $(this).attr('id'));
  //       // alert( $('.user_id').attr("id") );
  // });




  $('.del-image').click( function () {

  //       $('.user_id').attr('href',"/delDecoImage/"+$('.user_id').attr('id') );
      var txt;
      var r = confirm("刪除列表圖片");
      if (r == true) {

          $.post("/delDecoImage" ,
            { id : $('.del-image').attr('id') },
            function(data){
              alert( "刪除列表圖片成功！");
              location.reload()
          });

      }
  });

  $('.del-fb-image').click( function () {

  //       $('.user_id').attr('href',"/delDecoImage/"+$('.user_id').attr('id') );
      var txt;
      var r = confirm("刪除FB圖片？");
      if (r == true) {

          $.post("/delDecoFBImage" ,
            { id : $('.del-fb-image').attr('id') },
            function(data){
              alert( "刪除FB圖片成功！");
              location.reload()
          });

      }
  })

  // $('#myModal2').on('.modal2', function () {
  //
  //       $('.user_id2').attr('href',"/delDecoFBImage/"+$('.user_id').attr('id') );
  // })



})
</script>
