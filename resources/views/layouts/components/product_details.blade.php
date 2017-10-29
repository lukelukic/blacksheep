<div class="col-md-6 col-sm-6 col-xs-3">
    <div class="product-main-image">
        <img src="{{$details[0]['productDetailImgPath']}}" alt="{{$details[0]['productDetailImgAlt']}}" class="img-responsive">
    </div>
    {{--<div class="product-other-images">--}}
        {{--<a href="javascript:;" class="active"><img alt="PROIZVOD" src="assets/pages/img/products/model3.jpg"></a>--}}
        {{--<a href="javascript:;"><img alt="PROIZVOD" src="assets/pages/img/products/model4.jpg"></a>--}}
        {{--<a href="javascript:;"><img alt="PROIZVOD" src="assets/pages/img/products/model5.jpg"></a>--}}
    {{--</div>--}}
</div>
<div class="col-md-6 col-sm-6 col-xs-9">
    <h2>{{$details[0]['productDetailName']}}</h2>
    <div class="price-availability-block clearfix">
        <div class="price">
            <strong>{{$details[0]['productDetailNewPrice']}}<span>RSD<span/></strong>
            <em><span>{{$details[0]['productDetailOldPrice']}}<span/>RSD</em>
        </div>
    </div>
    <div class="description">
        <p>{{$details[0]['productDetailDescription']}}</p>
    </div>
    <div class="product-page-options">
        <div class="pull-left">
            <label class="control-label">Boja:</label>
            <select class="form-control input-sm">
                <option>Crvena</option>
                <option>Plava</option>
                <option>Bela</option>
            </select>
        </div>
    </div>
    <div class="product-page-cart">
        <div class="product-quantity">
            <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
        </div>
        <button class="btn btn-primary" type="submit">Dodaj u korpu</button>
        {{--<a href="#" class="btn btn-default">Detaljnije</a>--}}
    </div>
</div>
