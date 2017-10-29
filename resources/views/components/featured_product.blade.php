@foreach($featuredProduct as $featured)
<div>
    <div class="product-item">
        <div class="pi-img-wrapper">
            <img src="{{$featured['productImgPath']}}" class="img-responsive" alt="{{$featured['productImgAlt']}}">
            <div>
                <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Uvećaj</a>
                <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">Pogledaj</a>
            </div>
        </div>
        <h3><a href="#">{{$featured['productName']}}</a></h3>
        <div class="pi-price">{{$featured['productPrice']}} RSD</div>
        <a href="javascript:;" class="btn btn-default add2cart">Dodaj u korpu</a>
        @switch($featured['flag'])
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