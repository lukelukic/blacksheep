@foreach($popularProduct as $popular)
    <div>
        <div class="product-item">
            <div class="pi-img-wrapper">
                <img src="{{$popular['popularImgPath']}}" class="img-responsive" alt="{{$popular['popularImgAlt']}}">
                <div>
                    <a href="{{$popular['popularImgPath']}}" class="btn btn-default fancybox-button">Uvećaj</a>
                    <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">Pogledaj</a>
                </div>
            </div>
            <h3><a href="#">{{$popular['popularProductName']}}</a></h3>
            <div class="pi-price">{{$popular['popularProductPrice']}} RSD</div>
            <a href="javascript:;" class="btn btn-default add2cart">Dodaj u korpu</a>
            @switch($popular['flag'])
                @case('sale')
                <div class="sticker sticker-sale"></div>
                @break
                @case('new')
                <div class="sticker sticker-new"></div>
                @break
                @default
            @endswitch
        </div>
    </div>
    @endforeach