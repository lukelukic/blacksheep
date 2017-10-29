<div class="top-cart-info">
    <a href="javascript:void(0);" class="top-cart-info-count">Korpa ({{$info['cartProductCount']}})</a>
    <a href="javascript:void(0);" class="top-cart-info-value">{{$info['cartTotal']}} RSD</a>
</div>
<i class="fa fa-shopping-cart"></i>
<div class="top-cart-content-wrapper">
    <div class="top-cart-content">
        <ul class="scroller" style="height: 100%">
        @foreach($products as $pr)
                <li>
                    <a href=""><img src="{{$pr['cartImgPath']}}" alt="{{$pr['cartImgAlt']}}" width="37" height="34"></a>
                    <span class="cart-content-count">x {{$pr['cartProductMultiplier']}}</span>
                    <strong><a href="">{{$pr['cartProductName']}}</a></strong>
                    <em>{{$pr['cartProductPrice']}} RSD</em>
                    <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
            @endforeach
        </ul>

        <div class="text-right">
            <a href="cart" class="btn btn-default">Otvori korpu</a>
            <a href="checkout" class="btn btn-primary">Završi kupovinu</a>
        </div>
    </div>
</div>