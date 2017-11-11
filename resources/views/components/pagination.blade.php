<div class="row">
    <div class="col-md-12 col-sm-12">
        <ul class="pagination pull-right">
            <li id="paginationStart"><a href="#">&laquo;</a></li>

            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function() {

        //Prikaz samo prvih 15 proizvoda
        var products = $(".product-item");
        for(let i=12; i < products.length; i++) {
            $(products[i]).hide();
        }

        //Prikaz paginacije
        var itemsCount = products.length;
        var pages = (itemsCount%12) == 0 ? itemsCount/12 : parseInt(itemsCount/12 + 1);

        for(let i = pages; i > 0; i--) {
            let paginationItem = '<li><a onclick=showPage(' + i + ')>' + i + '</a></li>';
            $("#paginationStart").after(paginationItem);
        }
    });

    function showPage(page) {
        var products = $(".product-item");
        for(let i =0; i < products.length; i++) {
            $(products[i]).hide();
        }
        for(let i = (page-1)*12; i < page*12; i++)
        {
            $(products[i]).show();
        }
    }
</script>