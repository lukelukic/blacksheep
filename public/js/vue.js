/**
 * Created by luke on 23.10.17..
 */

Vue.component('info-card', {
    props : ["card"],
   template : '<div class="col-lg-3 col-md-6">' +
   '<div class="panel" :class="card.color">' +
    '<div class="panel-heading">' +
    '<div class="row">' +
    '<div class="col-xs-3">' +
    '<i class="fa fa-5x" :class="card.icon"></i></div>' +
    '<div class="col-xs-9 text-right">' +
    '<div class="huge">{{ card.number }}</div>' +
    '<div>{{ card.text }}</div></div> </div></div>'+
    '<a href="#"><div class="panel-footer"><span class="pull-left">View Details</span>' +
        '<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>' +
        '<div class="clearfix"></div> </div> </a> </div> </div>'
});

var categoryData = {
    name : 'Kategorija 123',
    hasParent : false,
    categories : [
        { id : 1, name : "Kategorija"}
    ]
};

Vue.component('category-form', {
    template : "<div>" +
    "<div class='form-group'><input type='text' class='form-control' placeholder='Ime kategorije' v-model='name'/></div>" +
    "<div class='form-group'><input type='checkbox' v-model='hasParent'/> Ima nadkategoriju</div>" +
    "<div v-if='hasParent' class='form-group'> <select v-model='categories' class='form-control'><option value='0'>Izaberi...</option><option v-for='cat in categories' :value='cat.id'>{{ cat.name }}</option></select></div>" +
    "<div class='form-group'><button class='btn btn-primary' @click='checkData'>Dodaj</button></div>" +
    "</div>",
    data : function() {
        return categoryData;
    },
    methods : {
        checkData : function() {

        }
    }
});


Vue.component('category-table', {
    template : "<table class='table table-stripped'>" +
    "<tr><th>Ime kategorije</th><th>Izmeni</th><th>Izbrisi</th></tr>" +
    "<tr v-for='cat in categories'><td>{{ cat.name }}</td><td><button @click='editItem(cat.id)' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button></td><td><button @click='deleteItem(cat.id)' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button></td></tr>" +
    "</table>",
    data : function() {
        return categoryData;
    },
    methods : {
        deleteItem : function(id) {
            console.log("Deleting..." + id);
        },
        editItem : function (id) {
            console.log("Editing..." + id);
        }
    }
});


new Vue({
   el : "#left"
});
var cards = [
    { number : "", text : "Novih porudzbina!", color : "panel-info", icon: "fa-comments" },
    { number : "", text : "Kupovina ove nedelje!", color : "panel-primary", icon: "fa-trash-o" },
    { number : "", text : "Registrovanih korisnika!", color : "panel-success", icon: "fa-comments" },
    { number : "", text : "Proizvoda dodatih ove nedelje!", color : "panel-warning", icon: "fa-comments" }
];

$.ajax({
   url : "http://localhost/blacksheep/public/index.php/cards",
   type : "GET",
    success : function(data) {
        for(let i=0; i<data.length; i++) {
            cards[i].number = data[i];
        }
    }, 
    error : function (xhr, status, error) {

    }
});

new Vue({
    el : "#page-wrapper",
    data : {
        cards : cards
    }
});