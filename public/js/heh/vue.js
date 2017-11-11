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
    categories :
    {
        selected: 'A',
        options: [
            { name: 'One', id: 'A' },
            { name: 'Two', id: 'B' },
            { name: 'Three', id: 'C' }
        ]
    }

};

Vue.component('category-form', {
    template : "<div>" +
    "<div class='form-group'><input type='text' class='form-control' placeholder='Ime kategorije' v-model='name'/></div>" +
    "<div class='form-group'><input type='checkbox' v-model='hasParent'/> Ima nadkategoriju</div>" +
    "<div v-if='hasParent' class='form-group'><p>Odaberi kategoriju: </p> <select v-model='categories.selected' class='form-control'><option v-for='c in categories.options' value='c.id'>{{ c.name }}</option></select></div>" +
    "<div class='form-group'><button class='btn btn-primary' @click='checkData'>Dodaj</button></div>" +
    "<div class='form-group' v-if='hasErrors'><div class='alert alert-danger'>Ime kategorije nije u dobrom formatu. Mora poceti velikim slovom i sadrzati samo slova i brojeve.</div></div>" +
    "<div class='form-group' v-if='success'><div class='alert alert-info'>Uspesan unos!</div></div>" +
    "</div>",
    data : function() {
        return {
            categories : categoryData.categories,
            hasParent : false,
            name : "",
            parentId : null,
            hasErrors : false,
            success : false
        }
    },
    methods : {
        checkData : function() {
            var reName = /^[A-Z][a-z]{2,15}(\s[\w]{1,20})*$/;
            if(reName.test(this.name)) {
                obj = {
                    url : base_url + "/admin/categories",
                    data : {
                        name : this.name,
                        parent_id : this.parent_id
                    },
                    type : "POST",
                    success : this.response,
                    error : function(error) {
                        console.log(error);
                    }
                };
                callAjax(obj);
            } else {
                this.hasErrors = true;
                this.success = false;
            }
        },
        response : function(data) {
            if(data.status) {
                this.success = true;
                this.hasErrors = false;
            }
        }
    }
});


Vue.component('category-table', {
    template : "<table class='table table-striped'><tbody>" +
    "<tr><th>Ime kategorije</th><th>Izmeni</th><th>Izbrisi</th></tr>" +
    "<tr v-for='cat in categories.options'><td>{{ cat.name }}</td><td><button @click='editItem(cat.id)' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button></td><td><button @click='deleteItem(cat.id)' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button></td></tr>" +
    "</tbody></table>",
    data : function() {
        return categoryData;
    },
    methods : {
        deleteItem : function(id) {
            obj = {
                url : base_url + "/admin/categories/" + id,
                type : "delete",
                success : function(data) {
                    console.log(data);
                },
                error : function(error) {
                    console.log(error);
                }
            };

            callAjax(obj);
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

 var obj = {
   url : base_url + "/admin/categories/create",
   type : "GET",
    success : function(data) {
        console.log(data);
        categoryData.categories.options = data;
    }, 
    error : function (xhr, status, error) {

    }
};

callAjax(obj);

new Vue({
    el : "#page-wrapper",
    data : {
        cards : cards
    }
});