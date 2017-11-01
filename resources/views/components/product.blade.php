@isset($products)
<div class="row product-list">
    @if(count($products))
        @foreach($products as $product)
            <div class="{{ isset($search) ? "col-md-3" : "col-md-4" }} col-sm-6 col-xs-12">
                <div class="product-item">
                    <div class="pi-img-wrapper">
                        <img src="{{ asset('assets/pages/img/products/' . $product['picture']['file']) }}" class="img-responsive" alt="{{ $product['picture']['file'] }}">
                        <div>
                            <a href="{{ asset('assets/pages/img/products/' . $product['picture']['file']) }}" class="btn btn-default fancybox-button">Uvećaj</a>
                            <a href="#product-pop-up" onclick="getProductDetails({{ $product['id'] }})" class="btn btn-default fancybox-fast-view">Pogledaj</a>
                        </div>
                    </div>
                    <h3><a href="#">{{ $product['name'] }}</a></h3>
                    <div class="pi-price">{{ $product['price'] }} RSD</div>
                    <form action="{{ url("/order/place") }}" method="post">
                        <input type="hidden" name="id" value="{{ $product['id'] }}">
                        <input type="submit" name="order" class="btn btn-default add2cart" value="Dodaj u korpu">
                    </form>
                    @if($product['is_offer'])
                        <div class="sticker sticker-sale"></div>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        {{ "Trazena strana ne postoji!" }}
    @endif
</div>
@endisset