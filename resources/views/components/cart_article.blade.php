<table summary="Shopping cart">
    <tr>
        <th class="goods-page-image">Slika</th>
        <th class="goods-page-description">Opis</th>
        <th class="goods-page-ref-no">Kod proizvoda</th>
        <th class="goods-page-quantity">Količina</th>
        <th class="goods-page-price">Cena po komadu</th>
        <th class="goods-page-total" colspan="2">Ukupna</th>
    </tr>
@foreach($article as $art)
<tr>
    <td class="goods-page-image">
        <a href="javascript:;"><img src="{{$art['imgPath']}}" alt="Neki kul alt"></a>
    </td>
    <td class="goods-page-description">
        <h3><a href="javascript:;">{{$art['name']}}</a></h3>
        <p>Boja: {{$art['color']}}</p>
        <em>{{$art['description']}}</em>
    </td>
    <td class="goods-page-ref-no">
        {{$art['code']}}
    </td>
    <td class="goods-page-quantity">
        <div class="product-quantity">
            <input id="product-quantity" type="text" value="{{$art['quantity']}}" readonly class="form-control input-sm">
        </div>
    </td>
    <td class="goods-page-price">
        <strong>{{$art['pricePerArticle']}}<span>RSD</span></strong>
    </td>
    <td class="goods-page-total">
        <strong>{{$art['totalPrice']}}<span>RSD</span></strong>
    </td>
    <td class="del-goods-col">
        <a class="del-goods" href="javascript:;">&nbsp;</a>
    </td>
</tr>
    @endforeach
</table>
</div>

<div class="shopping-total">
    <ul>
        <li>
            <em>Cena proizvoda</em>
            <strong class="price">{{$info['cost']}}<span>RSD</span></strong>
        </li>
        <li>
            <em>Cena dostave</em>
            <strong class="price">{{$info['deliveryCost']}}<span>RSD</span></strong>
        </li>
        <li class="shopping-total-price">
            <em>Total</em>
            <strong class="price">{{$info['totalCost']}}<span>RSD</span></strong>
        </li>
    </ul>
</div>
