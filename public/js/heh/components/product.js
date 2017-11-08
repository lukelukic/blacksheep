/**
 * Created by luke on 25.10.17..
 */

var podaciProizvoda = {
    name : "Ime proizvoda",
    description : "Opis proizvoda",
    categories : [
        { id : 1, name : "kategorija 1"},
        { id : 2, name : "kategorija 2"},
        { id : 3, name : "kategorija 3"}
    ],
    hasColor : false,
    price : 300,
    picture : "slika.jpg",
    selectedCategory : "",
    colors : [
        { id : 1, rgb : "123 123 123" }
    ],
    errors : [],
    feedback : false,
    hasErrors : false
};

Vue.component("product-form", {
    template : "<div>" +
    "<p class='lead'>Unos novog proizvoda:</p>" +
    "<div class='form-group'><input type='text' class='form-control' v-model='name' placeholder='Naziv proizvoda'/> </div>" +
    "<div class='form-group'> <textarea v-model='description' class='form-control' placeholder='Opis proizvoda'></textarea> </div>" +
    "<div class='form-group'> <select v-model='selectedCategory' class='form-control'><option value='0'>Izaberi...</option><option v-for='cat in categories' :value='cat.id'>{{ cat.name }}</option></select></div>" +
    "<div class='form-group'> <input type='checkbox' v-model='hasColor'> <span> Ima boju</span> <select v-if='hasColor'><option :value='color.id' v-for='color in colors'>{{ color.rgb }}</option></select></div>" +
    "<div class='form-group'><input type='text' class='form-control' v-model='price' placeholder='Price'/></div>" +
    "<div class='form-group'><input type='file' id='picture'/> </div>" +
    "<div class='form-group'><button class='btn btn-primary' @click='validate'>Dodaj</button></div>" +
    "<div class='alert alert-danger' v-if='hasErrors'><ul><li v-for='error in errors'>{{ error }}</li></ul></div>" +
    "<div class='alert alert-info' v-if='feedback'>Neki tamo feedback</div>" +
    "</div>",
    data : function () {
        return podaciProizvoda;
    },
    methods : {
        validate : function() {
            this.errors = [];
            var reProductName = /^[A-Z][a-z]{2,15}(\s[\w]{1,20})*$/;
            var reDescription = /^[\w\s]{10,200}$/;
            var rePrice = /^[1-9][0-9]{0,10}$/;

            if(!reProductName.test(this.name))
                this.errors.push("Ime proizvoda nije u dobrom formatu.");
            if(!reDescription.test(this.description))
                this.errors.push("Opis proizvoda mora biti izmedju 10 i 200 karaktera.");
            if(!this.selectedCategory || this.selectedCategory == 0)
                this.errors.push("Morate odabrati kategoriju proizvoda.");
            if(!rePrice.test(this.price))
                this.errors.push("Cena nije u dobrom formatu.");
            if(document.querySelector("#picture").files.length==0)
                this.errors.push("Polje za sliku nije odabrano.");
            this.hasErrors = this.errors.length > 0;

            if(!this.hasErrors) {
                $.ajax({
                    url : "http://localhost/blacksheep/public/index.php/product",
                    type : "POST",
                    success : function(data) {
                        console.log(this.feedback);
                    },
                    error : function (xhr, status, error) {

                    }
                });
            }

        }
    }
});
