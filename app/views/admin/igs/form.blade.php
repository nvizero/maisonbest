<div class="tab-pane active in" id="home">
    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <link href="/jqueryui/jquery-ui.css" rel="stylesheet">
    <script src="/jqueryui/external/jquery/jquery.js"></script>
    <script src="/jqueryui/jquery-ui.js"></script>


    <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">刪除</h3>
        </div>
        <div class="modal-body">
            <p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要刪除!?</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <a class="btn btn-danger user_id" alt="">Delete</a>
        </div>
    </div>

    <div class="modal small hide fade" id="myModal_facebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">刪除</h3>
        </div>
        <div class="modal-body">
            <p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要刪除facebook分享圖!?</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <a class="btn btn-danger user_id" alt="">Delete</a>
        </div>
    </div>

    <label>標題</label>
    <input type="text" name="name" value="<?php echo (!empty($post)) ? $post->name : ''?>" class="input-xlarge">

    <label>IG網址</label>
    <input type="text" name="url" value="<?php echo (!empty($post)) ? $post->url : ''?>" class="input-xlarge">


    <label>排序</label>
    <input type="text" name="pr" value="<?php echo (!empty($post)) ? $post->pr : ''?>" class="input-xlarge">

    <label>IG圖片</label>
    @if(!empty($post->image))
        <img src="/public{{$post->image}}" alt="" style="width: 360px;height: 220px;">
    @endif
        
    <br/>

    <input type="file" name="image" value="" class="input-xlarge">

    @if(!empty($post->id))
        <input type="hidden" name="id" value="{{$post->id}}">
    @endif

</div>


<style media="screen">
    label {
        font-size: 20px;
        font-weight: 600;
        margin: 8px 0px 8px 0px;
    }
</style>


<script type="text/javascript">
    $("document").ready(function () {

        $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});

        $("a.close2").click(function () {
            $('.user_id').attr('id', $(this).attr('id'));
        });

        $("a.close3").click(function () {
            $('.user_id').attr('id', $(this).attr('id'));
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('.user_id').attr('href', "/del_ig/" + $('.user_id').attr('id'));
        })


    })
</script>
