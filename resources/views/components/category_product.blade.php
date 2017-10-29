<div class="row product-list">
    @foreach($latestProduct as $latest)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="product-item">
                        <div class="pi-img-wrapper">
                            <img src="{{$latest['productImgPath']}}" class="img-responsive" alt="{{$latest['productImgAlt']}}">
                            <div>
                                <a href="{{$latest['productImgPath']}}" class="btn btn-default fancybox-button">Uvećaj</a>
                                <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">Pogledaj</a>
                            </div>
                        </div>
                        <h3><a href="#">{{$latest['productName']}}</a></h3>
                        <div class="pi-price">{{$latest['productPrice']}} RSD</div>
                        <a href="javascript:;" class="btn btn-default add2cart">Dodaj u korpu</a>
                        @switch($latest['flag'])
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
</div>