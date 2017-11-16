<script>
    $(document).ready(function() {

        //Prikaz samo prvih 15 proizvoda
        var products = $(".product-item");
        for(let i=12; i < products.length; i++) {
            $(products[i]).addClass('hide-pagination');
        }

        //Prikaz paginacije
        var itemsCount = products.length;
        var pages = (itemsCount%12) == 0 ? itemsCount/12 : parseInt(itemsCount/12 + 1);

        for(let i = pages; i > 0; i--) {
            let paginationItem = '<li><a href="#position" class="pag'+i+'" onclick=showPage(' + i + ')>' + i + '</a></li>';
            $(".paginationStart").after(paginationItem);
        }

        $(".pagination").append('<li><a id="paginationEnd"  onclick="showPage(' + pages + ')" href="#position">&raquo;</a></li>')
    });

    function showPage(page) {
        $('[class^="pag"]').css('color','#868c93');
        $(".pag"+page).css('color','red');
        var products = $(".product-item");
        for(let i =0; i < products.length; i++) {
            $(products[i]).addClass('hide-pagination');
        }
        for(let i = (page-1)*12; i < page*12; i++)
        {
            $(products[i]).removeClass('hide-pagination');
        }
    }
</script>