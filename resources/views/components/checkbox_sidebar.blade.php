<div class='filterBox'>
@foreach($categories as $category)
<input type="checkbox" name="brandChbs" onchange="hideByBrand({{ $category->id }})" name="{{strtolower(trim($category['name'],' '))}}" value="{{$category['id']}}">{{$category['name']}}<br>
@endforeach
</div>
<script>
    function hideByBrand(brandId)
    {
        //Dohvatanje checkboxova
        var brands = document.getElementsByName('brandChbs');
        var hasChecked = false;
        //Dohvatanje proizvoda
        var products = document.getElementsByClassName("product-item");
        for(let i = 0; i < brands.length; i++) {
            if (brands[i].checked) {
                hasChecked = true;
                for(let j=0; j<products.length; j++) {
                    if($(products[j]).find("#productBrand").val() == brands[i].value) {
                       $(products[j]).show();
                    }
                }
            } else {
                for(let j=0; j<products.length; j++) {
                    if($(products[j]).find("#productBrand").val() == brands[i].value) {
                        $(products[j]).hide();
                    }
                }
            }
        }
        if(!hasChecked) {
            for(let i = 0; i < products.length; i++) {
                $(products[i]).show();
            }
        }

    }
</script>