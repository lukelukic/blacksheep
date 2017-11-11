
    <div class="input-group reducediv pull-right">
        <input type="text" placeholder="Pretraži" id="searchProducts" class="form-control reducecontrol"/>
            <span class="input-group-btn">
                      <button class="btn btn-primary reducebtn"><i class='fa fa-search'></i></button>
            </span>
    </div>

    <script>
        $("#searchProducts").keyup(function(event) {
            var keyword = event.target.value.toLowerCase().trim();
            var products = document.getElementsByClassName("product-item");
            for(let i=0; i < products.length; i++) {
                let productName = $(products[i]).find("#productName").html().toLowerCase();
                if(productName.indexOf(keyword) !== -1) {
                    $(products[i]).show();
                } else {
                    $(products[i]).hide();
                }
            }
        });
    </script>