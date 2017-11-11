 <div class="pull-right">
        <label class="control-label">Sortiraj&nbsp;po:</label>
        <select class="form-control input-sm" id="sort">
            <option value="1">Cena Rastuće</option>
            <option value="2">Cena Opadajuće</option>
            <option value="3">Naziv A-Z</option>
            <option value="4">Naziv Z-A</option>
            <option value="5" selected>Prvo Novije</option>
            <option value="6">Prvo Starije</option>
        </select>
    </div>
<script>
    $("#sort").change(function(event) {
        var tmp = $(".product-item");
        var products = tmp.filter(function(n,i) {
            return !$(i).parent().hasClass("hidden");
        });

        switch(parseInt(event.target.value)) {
            case 1:
                    $("#products").html("");
                    products.sort(function (a, b){
                        var cena1 = parseInt($(a).find("#price").html());
                        var cena2 =  parseInt($(b).find("#price").html());
                        if(cena1 > cena2) return 1;
                        if(cena1 == cena2) return 0;
                        if(cena1 < cena2) return -1;
                    });
                    for(let i=0; i < products.length; i++) {
                        let productDiv = document.createElement("div");
                        $(productDiv).append(products[i]);
                        $("#products").append(productDiv);
                    }
                break;
            case 2:
                $("#products").html("");
                products.sort(function (a, b){
                    var cena1 = parseInt($(a).find("#price").html());
                    var cena2 =  parseInt($(b).find("#price").html());
                    if(cena1 > cena2) return -1;
                    if(cena1 == cena2) return 0;
                    if(cena1 < cena2) return 1;
                });
                for(let i=0; i < products.length; i++) {
                    let productDiv = document.createElement("div");
                    $(productDiv).append(products[i]);
                    $("#products").append(productDiv);
                }
                break;
            case 3:
                $("#products").html("");
                products.sort(function (a, b){
                    var ime1 = $(a).find("#productName").html().toLowerCase();
                    var ime2 =  $(b).find("#productName").html().toLowerCase();
                    if(ime1 > ime2) return 1;
                    if(ime1 == ime2) return 0;
                    if(ime1 < ime2) return -1;
                });
                for(let i=0; i < products.length; i++) {
                    let productDiv = document.createElement("div");
                    $(productDiv).append(products[i]);
                    $("#products").append(productDiv);
                }
                break;
            case 4:
                $("#products").html("");
                products.sort(function (a, b){
                    var ime1 = $(a).find("#productName").html().toLowerCase();
                    var ime2 =  $(b).find("#productName").html().toLowerCase();
                    if(ime1 > ime2) return -1;
                    if(ime1 == ime2) return 0;
                    if(ime1 < ime2) return 1;
                });
                for(let i=0; i < products.length; i++) {
                    let productDiv = document.createElement("div");
                    $(productDiv).append(products[i]);
                    $("#products").append(productDiv);
                }
                break;
            case 5:
                $("#products").html("");
                products.sort(function (a, b){
                    var id1 = parseInt($(a).find("#productId").val());
                    var id2 =  parseInt($(b).find("#productId").val());
                    if(id1 > id2) return 1;
                    if(id1 == id2) return 0;
                    if(id1 < id2) return -1;
                });
                for(let i=0; i < products.length; i++) {
                    let productDiv = document.createElement("div");
                    $(productDiv).append(products[i]);
                    $("#products").append(productDiv);
                }
                break;

            case 6:
                $("#products").html("");
                products.sort(function (a, b){
                    var id1 = parseInt($(a).find("#productId").val());
                    var id2 =  parseInt($(b).find("#productId").val());
                    if(id1 > id2) return -1;
                    if(id1 == id2) return 0;
                    if(id1 < id2) return  1;
                });
                for(let i=0; i < products.length; i++) {
                    let productDiv = document.createElement("div");
                    $(productDiv).append(products[i]);
                    $("#products").append(productDiv);
                }
                break;
            default:
                break;
        }
    });
</script>
