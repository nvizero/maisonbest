<style media="screen">
  input{
    width: 500px;
  }
</style>

  <div class="tab-pane active in" id="home">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif



  <label>標題</label>
  <input type="text" name="title" value="<?php echo (!empty($book))?$book->title:''?>" >

  <label>FB標題</label>
  <input type="text" name="fb_title" value="<?php echo (!empty($book))?$book->fb_title:''?>" >

  <input type="hidden" name="fbLink" value="fbLink">

  <label>日期</label>
  <input type="text" name="cdate" value="<?php echo (!empty($book))?$book->cdate:''?>" >

  <label>排序</label>
  <input type="text" name="prim" value="<?php echo (!empty($book))?$book->prim:''?>" >
  <br>

  <label>電子書-標題</label>
  <input type="text" name="book_title" value="" >
  
  <!-- 限制上傳檔案的最大值 -->
  <input type="hidden" name="MAX_FILE_SIZE" value="11111112097152">
  <label>新增電子書</label>
  <!-- accept 限制上傳檔案類型 -->
  <input type="file" name="myFile" >

  <label>電子書圖片</label>
  <!-- accept 限制上傳檔案類型 -->
  <input type="file" name="myFile_pic" >

  <br>

  <label>電子書列表</label>
  <div style="display:flex;">
  <?php 
    if(!empty($book)){
  ?>
  
    @foreach( DB::table('book_files')->where('book_id' ,$book->id )->get() as $book_file )
      <div class="book_llist" style="margin: 5px;">
        <span> <a href="#" class="btn btn-sm btn-danger del-book" id="{{$book_file->id}}">刪除電子書</a>  </span>
        <div>          
          <span> 
            <img src="/{{$book_file->file_pic}}" alt="" style="max-height: 100px;"> 
          </span>
        </div>
        <p style="text-align: center;">
          <a href="/{{$book_file->file}}">{{$book_file->book_title}}</a>
        </p>
      </div>
    @endforeach
  <?php 
    }
  ?>
  </div>
  

  <label>是否顯示 </label>
  <?php
  $flag =  (!empty($book))?$book->flag:1;

  if($flag==NULL){
    $flag=0;
  }
  ?>
  是
  <input type="radio" name="flag" value="0" {{($flag==0)?" checked ":""}} >

  否
  <input type="radio" name="flag" value="1"  {{($flag==1)?" checked ":""}} >



  <label>列表照片</label>
  <font style="color:red;">圖片檔案為_尺寸寬500px高320px</font>


  <br>
  @if(!empty($book) && $book->image)
  <div class="col-md-1" style="wdith:200px;">


      <button type="button" id="{{$book->id}}"  class="close2"  style="float:left;" >×</button>

      {{ HTML::image( "/public".$book->image ,'',array( 'class' => 'img-thumbnail',
                                          "id" => $book->id ,
                                          'style' =>  "width:200px;height:190px;")) }}
  </div>
  @else
    <input type="file" name="image" value="" class="input-xlarge">
  @endif

<br>
<br>
  
 


  <br>
    <label>FB分享照片</label>
    <font style="color:red;"> </font>
    <br>
    @if(!empty($book) && $book->image_facebook)
    <div class="col-md-1" style="wdith:200px;">


        <button type="button" id="{{$book->id}}"  class="close4"  style="float:left;" >×</button>

        {{ HTML::image( "/public".$book->image_facebook ,'',array( 'class' => 'img-thumbnail',
                                            "id" => $book->id ,
                                            'style' =>  "width:200px;height:190px;")) }}
    </div>
    @else
      <input type="file" name="image_facebook" value="" class="input-xlarge">
    @endif

  <label>內容</label>
  <textarea name="content" rows="8" cols="40" ><?php echo ($book)?$book->content:''?></textarea>



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
      // $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
      // alert('qq');
      $(".del-book").click(function(){
            var html = $(this);
            var pic_id = html.attr('id') ;
            $(this).clone().appendTo('.clone');
            
            var r = confirm("確定刪除電子書!?");
            if (r == true) {
              $.post("/delBookFile",                    
                    {"id":pic_id},
                    function(data){
                      // alert(data);
                      if(data==1){
                          location.reload();
                      }
              });
            }

      });


      $(".close3").click(function(){
            var html = $(this);
            var pic_id = html.attr('id') ;
            // $(this).clone().appendTo('.clone');
            // alert(pic_id);
            var r = confirm("確定刪除圖片!?");
            if (r == true) {

              $.post("/delbookImage2",
                    {"id":pic_id},
                    function(data){
                      // alert(data);
                      if(data==1){
                          location.reload();
                      }


                  });
            }

      });

      $(".close4").click(function(){
            var html = $(this);
            var pic_id = html.attr('id') ;
            // $(this).clone().appendTo('.clone');
            // alert(pic_id);
            var r = confirm("確定刪除圖片!?");
            if (r == true) {

              $.post("/delbookImg_facebook",
                    {"id":pic_id},
                    function(data){
                      // alert(data);
                      if(data==1){
                          location.reload();
                      }


                  });
            }

      });

});
</script>
