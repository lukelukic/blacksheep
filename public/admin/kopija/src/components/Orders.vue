<template lang="html">
  <div>
        <div class='col-md-12 title'>Admin - Porudžbine</div>
  <div class='container'>
    <div class='col-md-2' style='font-size:15px; padding-top:5px'>Filter:</div>
    <div class='col-md-5' style='margin-bottom:15px'><select class=' form-control' v-model='orderPodaci.filter' v-on:change='reset'><option v-bind:value='1'>Neobradjene</option><option v-bind:value='2'>Poslate</option><option v-bind:value='3'>Odbijene</option></select></div>
    <div class='col-md-5' style='padding-top:5px'>Ukupno porudzbina: {{orderBazaPodaci.length}}</div>
  </div>
          <div class='container'>
          <div class='col-md-3'>
          <table class='table table-bordered table-hover'><tbody>
          <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Datum</th>
            <th><i class='fa fa-search'></i></th>
          </tr>
          <tr v-for='ord in orderBazaPodaci' v-if='ord.status_id == orderPodaci.filter' >
            <td>{{ ord.id }}</td>
            <td>{{ord.status_id == 1 ? 'N' : ord.status_id == 2 ? 'P' : 'O' }}</td>
            <td>{{ ord.created_at }}</td>
            <td><button @click='openPanel(ord.id)' class='btn btn-primary btn-xs'>Pogledaj</button></td>
          </tr>
          </tbody>
        </table>
      </div>
          <div class='col-md-9' v-if='orderPodaci.clicked'>
          <table class='table table-bordered'><tbody>
          <tr>
          <td>ID</td>
          <td v-if='orderPodaci.clicked'>{{orderPodaci.id}}</td>
          </tr>
          <tr>
          <td>Ime i prezime</td>
          <td v-if='orderPodaci.clicked'>{{orderPodaci.user.firstName+" "+orderPodaci.user.lastName}}</td>
          </tr>
          <tr>
          <td>Proizvodi</td>
          <td v-if='orderPodaci.clicked'><form action=''>
          <div v-if='orderPodaci.filter == 1'>
            <select id='proizvodi' v-model='orderPodaci.cancel' class='form-control'  multiple>
              <option v-for='order in orderPodaci.products'>{{order.name+' x '+order.pivot.amount}}</option>
            </select>
          </div>
          <div v-else><span v-for='order in orderPodaci.products'>{{order.name}} | </span></div>
          </form>
        </td>
          </tr>
          <tr>
          <td>Cena</td>
          <td v-if='orderPodaci.clicked'>{{orderPodaci.price}}</td>
          </tr>
          <tr>
          <td>Status</td>
          <td v-if='orderPodaci.clicked'>{{orderPodaci.status_id == 1 ? 'Nije obradjena' : orderPodaci.status_id == 2 ? 'Poslata' : 'Odbijena' }}</td>
          </tr>
          <tr>
          <td>Datum</td>
          <td v-if='orderPodaci.clicked'>{{orderPodaci.created_at}}</td>
          </tr>
          <tr>
          <td>Adresa</td>
          <td v-if='orderPodaci.clicked'>{{orderPodaci.user.address}}</td>
          </tr>
          <tr>
          <td>Telefon</td>
          <td v-if='orderPodaci.clicked'>{{orderPodaci.user.phone}}</td>
          </tr>
          <tr>
          <td>Grad</td>
          <td v-if='orderPodaci.clicked'>{{orderPodaci.user.city}}</td>
          </tr>
          <tr>
          <td>Poštanski broj</td>
          <td v-if='orderPodaci.clicked'>{{orderPodaci.user.postNumber}}</td>
          </tr>
          <tr>
          <td colspan='8' v-if='orderPodaci.filter == 1'><button class='btn btn-success' v-if='orderPodaci.cancel.length==0' @click='posalji(2)'>Posalji</button><button v-if='orderPodaci.cancel.length>0' class='btn btn-danger' @click='posalji(3)'>Otkazi</button>&nbsp;<button v-if='orderPodaci.cancel.length>0' class='btn btn-info' @click='posalji(2)'>Potvrdi sa izmenama</button><button class='btn btn-danger' v-if='orderPodaci.cancel.length==0' @click='obrisi'>Obrisi</button></td>
          </tr>
          </tbody></table>
          </div>
          <div class='col-md-9' v-else></div>
          <div id='feedback' class='alert alert-success nev'></div>
          <div id='err' class='alert alert-danger nev'></div>
          </div>
          </div>

</template>
<script>
    // import '../js/ajax.js'
    export default {
        data: function() {
            console.log(window.poklon);
            return {
                orderBazaPodaci: orderDbData,
                orderPodaci: orderData
            }
        },
        methods: {
            reset: function() {
                this.orderPodaci.clicked = false;
            },
            posalji: function(i) {
                this.resetHolders();
                var data = {
                    id: this.orderPodaci.id,
                    firstName: this.orderPodaci.user.firstName,
                    lastName: this.orderPodaci.user.lastName,
                    products: this.orderPodaci.products,
                    price: this.orderPodaci.price,
                    created_at: this.orderPodaci.created_at,
                    address: this.orderPodaci.user.address,
                    tel: this.orderPodaci.user.tel,
                    city: this.orderPodaci.user.city,
                    zipcode: this.orderPodaci.user.postNumber
                }
                console.log(data);
                switch (i) {
                    case 2:
                        var status_id = 2;
                        break;
                    case 3:
                        var status_id = 3;
                        break;
                    default:
                }
                $.ajax({
                    url: window.base_url+'/orders',
                    type: 'POST',
                    dataType: "json",
                    data: data, //saljem ti jebene statuse, 2-poslata kako god, 3-obijena, 0-prakticno nemoguce jelte
                    success: function(data) {
                        $('#feedback').html('Uspešno izvršeno!');
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        $("#err").html("Dogodila se greska").removeClass('nev');
                    }
                });
            },
            obrisi: function() {
                var id = this.orderPodaci.id;
                this.resetHolders();
                $.ajax({
                    url: window.base_url+'/orders',
                    type: 'DELETE',
                    dataType: "json",
                    data: id,
                    success: function(data) {
                        $('#feedback').html('Uspešno izvršeno!');
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        $("#err").html("Dogodila se greska, poslat je [id] : " + id).removeClass('nev');
                    }
                });
            },
            openPanel: function(id) {
              console.log(this.orderPodaci.user);
                this.resetHolders();
                this.orderPodaci.clicked = true;
                for (var i = 0; i < this.orderBazaPodaci.length; i++) {
                    if (this.orderBazaPodaci[i]['id'] == id) {
                        this.orderPodaci.id = this.orderBazaPodaci[i]['id'];
                        this.orderPodaci.user.firstName = this.orderBazaPodaci[i].user.firstName;
                        this.orderPodaci.user.lastName = this.orderBazaPodaci[i].user.lastName;
                        this.orderPodaci.products = this.orderBazaPodaci[i]['products'];
                        this.orderPodaci.price = this.orderBazaPodaci[i]['price'];
                        this.orderPodaci.status_id = this.orderBazaPodaci[i]['status_id'];
                        this.orderPodaci.created_at = this.orderBazaPodaci[i]['created_at'];
                        this.orderPodaci.user.address = this.orderBazaPodaci[i].user.address;
                        this.orderPodaci.user.tel = this.orderBazaPodaci[i].user.tel;
                        this.orderPodaci.user.city = this.orderBazaPodaci[i].user.city;
                        this.orderPodaci.user.postNumber = this.orderBazaPodaci[i].user.postNumber;
                    }
                }
            },
            resetHolders: function() {
                $('#err').html("").addClass('nev');
                $('#success').html("").addClass('nev');
            },
            potvrdi: function(id) {
                for (i = 0; i < this.orderBazaPodaci.length; i++) {
                    if (this.orderBazaPodaci[i]['id'] == id) {
                        this.orderBazaPodaci[i]['status_id'] = true;
                    }
                }
            },
            dohvati : function(){
              var self = this;
              $.ajax({
                url: window.base_url+'/orders',
                type:'GET',
                dataType: 'json',
                success: function(data){
                  self.orderBazaPodaci = data.orders;
                },
                error: function(xhr, status, error){

                }
              });
            }

        },
        beforeMount(){
          this.dohvati()
        }
    }
    var orderData = {
        id: 1,
        id: "1",
        clicked: false,
        products: [{
            id: 1,
            name: 'Proizvod 1',
            amount: 3,
            price: 200,
            pivot:{
              amount : 5,
              product_id : 1,
              order_id : 1,
              created_at : new Date().toLocaleDateString()
            }
        }],
        user:{
          firstName : "Bora",
          lastName : "Corba",
          email : "hehe",
          phone : "063",
          address : "hehe",
          city: "Rsn",
          postNumber:"11500"
        },
        price: "2358",
        created_at: new Date().toLocaleDateString(),
        status_id: '0',
        filter: '1',
        cancel: []
    }
    /* imp */
    var orderDbData = [{
        id: "2",
        products: [{
            id: 1,
            name: 'Proizvod 1',
            amount: 3,
            price: 200,
            pivot:{
              amount : 5,
              product_id : 1,
              order_id : 1,
              created_at : new Date().toLocaleDateString()
            }
        }, {
            id: 2,
            name: 'Proizvod 2',
            amount: 1,
            price: 200,
            pivot:{
              amount : 5,
              product_id : 1,
              order_id : 1,
              created_at : new Date().toLocaleDateString()
            }
        }, {
            id: 3,
            name: 'Proizvod 3',
            amount: 7,
            price: 200,
            pivot:{
              amount : 5,
              product_id : 1,
              order_id : 1,
              created_at : new Date().toLocaleDateString()
            }
        }],
        user:{
          firstName : "Bora",
          lastName : "Corba",
          email : "hehe",
          phone : "063",
          address : "hehe",
          city: "Rsn",
          postNumber:"11500"
        },
        price: "500",
        status_id: 1,
        created_at: new Date().toLocaleDateString(),
    }];
</script>
<style lang="css">
</style>
