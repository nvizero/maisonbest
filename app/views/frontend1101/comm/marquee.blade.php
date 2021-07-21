<div class="row-marquee">
    <img src="/images/row.png"  style="display: none">
    <div class="marquee" id="m">
        @foreach($c_sql as $ad8)
            @if(  !empty($ad8->image) AND File::exists( public_path().$ad8->image)  )
                <a href="{{$ad8->url}}" target="_new">
                    <img src="/public{{$ad8->image}}">
                </a>
            @endif
        @endforeach
    </div>
    <img src="/images/row.png" style="display: none">
</div>



