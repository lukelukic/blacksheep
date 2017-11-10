<div class='filterBox'>
@foreach($categories as $category)
<input type="checkbox" name="brandChbs" onchange="hideByBrand({{ $category->id }})" name="{{strtolower(trim($category['name'],' '))}}" value="{{$category['id']}}">{{$category['name']}}<br>
@endforeach
</div>
<script>
    function hideByBrand(brandId)
    {
        var brands = document.getElementsByName('brandChbs');
        var hasChecked = false;
        var products = document.getElementsByName("productBrand")
        for(let i = 0; i < brands.length; i++) {
            if (brands[i].checked) {
                hasChecked = true;
                for(let j=0; j<products.length; j++) {
                    if(products[j].value == brands[i].value) {
                       $($(products[j]).parent()).parent().show();
                    }
                }
            } else {
                for(let j=0; j<products.length; j++) {
                    if(products[j].value == brands[i].value) {
                        $($(products[j]).parent()).parent().hide();
                    }
                }
            }
        }
        if(!hasChecked) {
            for(let i = 0; i < products.length; i++) {
                $($(products[i]).parent()).parent().show();
            }
        }

    }
</script>