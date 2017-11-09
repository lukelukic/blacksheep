
                <div class="product-item">
                    <div class="pi-img-wrapper">
                        <img src="{{ asset('assets/pages/img/products/' . $product->picture->file) }}" class="img-responsive" alt="{{ $product->picture->alt }}">
                        <div>
                            <a href="{{ asset('assets/pages/img/products/' . $product->picture->file) }}" class="btn btn-default fancybox-button">Uvećaj</a>
                            <a href="#product-pop-up" onclick="getProductDetails({{ $product['id'] }})" class="btn btn-default fancybox-fast-view">Pogledaj</a>
                        </div>
                    </div>
                    <h3><a href="#" id="productName">{{ $product['name'] }}</a></h3>
                    <div class="pi-price"><span id="price">{{ $product->prices->first()['price'] }}</span> RSD</div>
                    <form action="{{ url("/order/place") }}" method="post">
                        <input type="hidden" id="productId" value="{{ $product['id'] }}">
                        <input type="submit" name="order" class="btn btn-default add2cart" value="Dodaj u korpu">
                    </form>
                    @if($product['is_offer'])
                        <div class="sticker sticker-sale"></div>
                    @endif
                    <div class="sticker sticker-new"></div>
                    <input type="hidden" name="productBrand" value="{{ $product->brand->id }}">
                </div>


