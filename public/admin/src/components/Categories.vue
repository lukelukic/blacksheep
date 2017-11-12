<template>
  <div>
    <div class='col-md-12 title'>Admin - Kategorije</div>
    <div class='col-md-12'>
      <table>
        <tr>
          <td>
            <input type='text' v-model='forma.name' class='form-control' placeholder='Nova kategorija'/>
          </td>
          <td v-if='forma.isInsert'><button type='button' @click='newOne' class='btn btn-success btn-xs'>Dodaj</button></td>
          <td v-else><button type='button' @click='edit' class='btn btn-success btn-xs'>Izmeni</button>&nbsp;<button @click='switchToInsert()' class='btn btn-info btn-xs'><i class='fa fa-plus'></i></button></td>
        </tr>
        <tr>
          <td>
            <ul style='list-style-type:none; overflow:scroll; height:150px' class='form-control'>
          <li v-for='c in forma.brands'>{{c.name}}<input type='checkbox' v-model='forma.checked' :value='c.id' :id='c.id' class='form-control chbWidth'/></li>
          </ul>
        </td>
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
           <th>Brendovi</th>
           <th>Izmeni</th>
           <th>Obrisi</th>
         </thead>
         <tbody>
           <tr v-for='p in podaci.category'>
             <td>{{p.name}}</td>
             <td>
               <ul v-for='bk in p.brands'>
                 <li>{{bk.name}}</li>
               </ul>
               <!-- <select id='brendovi' class='form-control' v-model='podaci.selectedBrands' multiple>
                   <option v-for='bk in p.brands' :value='bk.id'>{{bk.name}}</option>
               </select> -->
             </td>
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
                brendovi : sviPodaci.category,
                unos: dodavanjePodataka,
                brisanje: brisanjePodataka,
                izmena: izmenaPodataka,
                forma: formData,
                brands : formData.brands,
                errors: []
            }
        },
        methods: {
          dohvatiBrend : function(){
            $.ajax({
              url: window.base_url+'/categories',
              type: 'GET',
              dataType: "json",
              success: function(data) {
                  formData.brands = data.brands;
              },
              error: function(xhr, status, error) {
                  $("#feedback").html("Dogodila se greska").removeClass('nev');
              }
            });
          },
            formReset : function(){
              this.forma.id = '',
              this.forma.name = ''
            },
            switchToInsert(){
              this.formReset();
              this.resetHolders();
              this.forma.isInsert = true;
            },
            resetHolders : function(){
              this.errors = [],
              $("#err").html("");
              $("#cat").html("");
            },
            dohvati: function() {
                $.ajax({
                    url: window.base_url+'/categories',
                    type: 'GET',
                    dataType: "json",
                    success: function(data) {
                      console.log(data.categories);
                        sviPodaci.category = data.categories;
                        // for(var i = 0;i<sviPodaci.category.length;i++){
                        //   for(var j = 0; j<sviPodaci.category[i].brands.length;j++){
                        //     sviPodaci.brands.push(sviPodaci.category[i].brands[j]);
                        //     sviPodaci.brandkat.push({id:sviPodaci.category[i].brands[j].pivot.category_id});
                        //   }
                        // }

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
                    url: window.base_url+'/categories/'+x,
                    type: 'DELETE',
                    data: {
                    type : 'category'
                  },
                    success: function(data) {

                    },
                    error: function(xhr, status, error) {
                        $("#err").html("Dogodila se greska - "+ xhr.status + "<br/> Poslati su [očekivani tip] i [id]: "+brisanjePodataka.id).removeClass('nev');
                    }
                });
                this.dohvati()
                this.dohvati()
                this.dohvati()
                this.formReset()
            },
            preEdit : function(x){
              this.resetHolders();
              formData.checked = [];
              formData.isInsert = false;
              for(var i=0;i<sviPodaci.category.length;i++){
                if(sviPodaci.category[i]['id']==x){
                  formData.name = sviPodaci.category[i]['name'];
                  formData.id = sviPodaci.category[i]['id'];
                  for(var j = 0; j<sviPodaci.category[i].brands.length;j++){
                      formData.checked.push(sviPodaci.category[i].brands[j]['id'])
                    }
                }
              }
            },
            edit: function(x) {
                izmenaPodataka.id = formData.id;
                izmenaPodataka.name = formData.name;
                console.log(izmenaPodataka);
                $.ajax({
                    url: window.base_url+'/categories/'+izmenaPodataka.id,
                    type: 'PATCH',
                    dataType: "json",
                    data: {
                      name : izmenaPodataka.name,
                      type : 'category'
                    },
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
                if (!reName.test(this.forma.name)) this.errors.push("Ime kategorije nije u dobrom formatu!");
                if(this.forma.checked.length == 0) this.errors.push("Brend je obavezan");
                else{
                  $.ajax({
                      url: window.base_url+'/categories',
                      type: 'POST',
                      dataType: "json",
                      data: {
                        name : this.forma.name,
                        brands: this.forma.checked,
                        type : this.forma.type
                      },
                      success: function(data) {
                          $("#cat").html("Kategorija uspešno uneta!").removeClass('nev');
                        },
                      error: function(xhr, status, error) {
                        switch (xhr.status) {
                          case 201:
                          $("#cat").html("Kategorija uspešno uneta!").removeClass('nev');
                          break;
                          case 400:
                          $("#cat").html("Kategorija sa istim imenom već postoji!").removeClass('nev');
                            break;
                          default:
                          $("#err").html("Dogodila se greska - "+ xhr.status).removeClass('nev');
                        }

                      }
                  });
                  this.dohvati()
                  this.dohvati()
                  this.dohvati()
                  this.formReset()
                }

            }
        },
        beforeMount() {
            this.dohvati()
            this.dohvatiBrend()
        }
    }
    var dodavanjePodataka = {
        type: 'category',
        name: ''
    }
    var brisanjePodataka = {
        type: 'category',
        id: ''
    }
    var izmenaPodataka = {
        type: 'category',
        id: '',
        name: ''
    }

    var sviPodaci = {
        selectedBrands : [],
        category: [{
            id: 1,
            name: 'pera',
            brands : [{
              id :1,
              name :'brend',
              created_at : new Date().toLocaleDateString()
            }]
        }]
    }
    var formData = {
      type : 'category',
      name : '',
      id : '',
      brands : [{
        id:1,
        name:'brend'
      }],
      isInsert : true,
      checked:[]
    }
</script>
