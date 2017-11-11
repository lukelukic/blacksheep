<template>
  <div>
    <div class='col-md-12 title'>Admin - Brendovi</div>
    <div class='col-md-12'>
      <table>
        <tr>
          <td><input type='text' v-model='forma.name' class='form-control' placeholder='Novi brend'/></td>
          <td v-if='forma.isInsert'><button type='button' @click='newOne' class='btn btn-success'>Dodaj</button></td>
          <td v-else><button type='button' @click='edit' class='btn btn-success'>Izmeni</button>&nbsp;<button @click='switchToInsert' class='btn btn-info'><i class='fa fa-plus'></i></button></td>
        </tr>
        <tr>
          <td colspan='2' v-if='errors' v-for='error in errors' class='panel panel-danger'>{{error}}<br/></td>
        </tr>
        <tr>
          <td class='nev' id='cat'>
            <div class="panel panel-success">
              <div class="panel-heading"></div>
            </div>
          </td>
          <td class='nev' id='err'>
            <div class="panel panel-danger">
              <div class="panel-heading"></div>
              </div>
          </td>
        </tr>
      </table>
     </div>
     <div class='col-md-12'>
       <table class='table table-hover table-condensed'>
         <thead>
           <th>Naziv</th>
           <th>Izmeni</th>
           <th>Obrisi</th>
         </thead>
         <tbody>
           <tr v-for='p in podaci.brand'>
             <td>{{p.name}}</td>
             <td><button type='button' class='btn btn-warning' @click='preEdit(p.id)'><i class='fa fa-edit'></i></button></td>
             <td><button type='button' class='btn btn-danger' @click='preRemove(p.id)'><i class='fa fa-remove'></i></button></td>
           </tr>
         </tbody>
       </table>
     </div>
  <!-- <button @click='dohvati'>Dohvati</button>
  <button @click='insert'>Dodaj</button>
  <ul v-for='p in podaci.category'>
    <li>{{p.name}}</li>
  </ul> -->
</div>
</template>
<script>
    export default {
        data() {
            return {
                podaci: sviPodaci,
                unos: dodavanjePodataka,
                brisanje: brisanjePodataka,
                izmena: izmenaPodataka,
                forma: formData,
                errors: []
            }
        },
        methods: {
            formReset : function(){
              this.forma.id = '',
              this.forma.name = ''
            },
            resetHolders : function(){
              this.errors = [],
              $("#err").html("");
              $("#cat").html("");
            },
            switchToInsert(){
              this.formReset();
              this.resetHolders();
              this.forma.isInsert = true;
            },
            dohvati: function() {
                $.ajax({
                    url: window.base_url+'/categories',
                    type: 'GET',
                    dataType: "json",
                    success: function(data) {
                      console.log(data);
                        sviPodaci.brand = data.brands;
                    },
                    error: function(xhr, status, error) {
                        $("#err").html("Greska u dohvatanju podataka iz baze!");
                    }
                });
            },
            preRemove: function(x) {
                brisanjePodataka.id = x;
                console.log(this.brisanje);
                $.ajax({
                    url: window.base_url+'/categories',
                    type: 'DELETE',
                    dataType: "json",
                    data: {
                      type : 'brand'
                    },
                    success: function(data) {

                    },
                    error: function(xhr, status, error) {
                        $("#err").html("Dogodila se greska - "+ xhr.status + "<br/> Poslati su [očekivani tip] i [id]: "+brisanjePodataka.id).removeClass('nev');
                    }
                });
                this.dohvati()
                this.dohvati()
                this.formReset()
                console.log('dohvaceno opet');
            },
            preEdit : function(x){
              this.resetHolders();
              formData.isInsert = false;
              for(var i=0;i<sviPodaci.brand.length;i++){
                if(sviPodaci.brand[i]['id']==x){
                  formData.name = sviPodaci.brand[i]['name'];
                  formData.id = sviPodaci.brand[i]['id'];
                }
              }
            },
            edit: function(x) {

                izmenaPodataka.id = formData.id;
                izmenaPodataka.name = formData.name;
                console.log(izmenaPodataka);
                $.ajax({
                    url: window.base_url+'/categories',
                    type: 'PATCH',
                    dataType: "json",
                    data: this.izmenaPodataka,
                    success: function(data) {},
                    error: function(xhr, status, error) {
                                            $("#err").html("Dogodila se greska - "+ xhr.status + "<br/> Poslati su: [očekivani tip], [id]: "+izmenaPodataka.id+" i [name]: "+izmenaPodataka.name).removeClass('nev');
                    }
                });
                this.dohvati()
                this.dohvati()
                this.formReset()
                console.log('dohvaceno opet');
            },
            newOne: function() {
                this.resetHolders();
                console.log(this.forma.name);
                $("#cat").html("");
                this.errors = [];
                var reName = /^[A-Z]{1}[A-z,-\s0-9]{1,20}$/;
                if (!reName.test(this.forma.name)) this.errors.push("Ime brenda nije u dobrom formatu!");
                else{
                  $.ajax({
                      url: window.base_url+'/categories',
                      type: 'POST',
                      dataType: "json",
                      data: {
                        name : this.forma.name,
                        type : this.forma.type
                      },
                      success: function(data) {
                          $("#cat").html("Brend uspešno unet!").removeClass('nev');
                        },
                      error: function(xhr, status, error) {
                        switch (xhr.status) {
                          case 201:
                          $("#cat").html("Brend uspešno unet!").removeClass('nev');
                          break;
                          case 400:
                          $("#cat").html("Brend sa istim imenom već postoji!").removeClass('nev');
                            break;
                          default:
                          $("#err").html("Dogodila se greška - "+ xhr.status).removeClass('nev');
                        }

                      }
                  });
                  this.dohvati()
                  this.dohvati()
                  this.formReset()
                }

            }
        },
        beforeMount() {
            this.dohvati()
        }
    }
    var dodavanjePodataka = {
        type: 'brand',
        name: ''
    }
    var brisanjePodataka = {
        type: 'brand',
        id: ''
    }
    var izmenaPodataka = {
        type: 'brand',
        id: '',
        name: ''
    }

    var sviPodaci = {
        brand: [{
            id: 1,
            name: 'pera'
        }]
    }
    var formData = {
      type : 'brand',
      name : '',
      id : '',
      isInsert : true
    }
</script>
