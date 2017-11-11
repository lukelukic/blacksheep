<template>
  <div>
        <div class='col-md-12 title'>Admin - Boje</div>
  <div class='col-md-6'>
    <table class='table table-striped'><tbody>
    <tr ><th>Boja</th><th>Izmeni</th><th>Izbrisi</th></tr>
    <tr v-for='boja in bojaBazaPodaci' >
      <td><div v-bind:style='{backgroundColor: boja.hex}' style='width:20px; height:20px; border:1px solid #000'></div></td>
      <td><button @click='editItem(boja.id)' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button></td>
      <td><button @click='deleteItem(boja.id)' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button></td>
    </tr>
    </tbody></table>
    <table style='margin:0 auto' ><tr>
    </tr></table>
  </div>
  <div class='col-md-6'>
    <hr>
    <h5 v-if='formData.isInsert'>Unos nove boje</h5>
    <h5 v-if='!formData.isInsert'>Izmena boje</h5>
        <div class='col-md-5'><div class='form-group'><input type='color' class='form-control' id='color' v-model='formData.hex'/> </div></div>
        <div class='col-md-6'><div class='form-group' v-if='formData.isInsert'><button class='btn btn-primary' @click='unos()'>Dodaj</button></div></div>
        <div class='col-md-6'></div>
        <div class='col-md-6'><div class='form-group' v-if='!formData.isInsert'><button class='btn btn-primary' @click='unos()'>Izmeni</button>&nbsp;<button @click='formData.isInsert=true' class='btn btn-info'><i class='fa fa-plus'></i></button></div></div>
        <div class='col-md-12'><div class='alert alert-danger' v-if='formData.hasErrors'><ul><li v-for='error in formData.errors'>{{ error }}</li></ul></div></div>
        <div class='col-md-12'><div class='form-group'><div class='alert alert-danger nev' id='feedback'></div></div></div>
        <div class='col-md-12'><div class='form-group'><div class='alert alert-info nev' id='success'></div></div></div>
  </div>
</div>
</template>
<script>
export default {
data: function() {
    return {
        bojaBazaPodaci: colorDbData.colors,
        formData: colorData
    }
},
methods: {
  dohvati : function(){
    var self = this;
    $.ajax({
      url: window.base_url+'/colors',
      type: 'GET',
      dataType: "json",
      success: function(data) {
        self.bojaBazaPodaci = data.colors;
      },
      error: function(xhr, status, error) {
          $("#feedback").html("Dogodila se greska").removeClass('nev');
      }
    });
  },
  unos: function() {
    $('#feedback').html("").addClass('nev');
    $('#success').html("").addClass('nev');
        var type ='';
        var data ='';
          switch (this.formData.isInsert) {
              case true:
                  type = 'POST';
                  data = {hex:this.formData.hex}
                  break;
              case false:
                  type = 'PATCH';
                  data = {id:this.formData.id,hex:this.formData.hex}
                  break;
              default:

          }
          $.ajax({
              url: window.base_url+'/colors',
              type: type,
              data: data,
              success: function(data) {
                  $('#success').html("Uspesan unos!").removeClass('nev');
                  console.log(data);

              },
              error: function(xhr, status, error) {
                  $("#feedback").html("Dogodila se greska - "+ xhr.status + "<br/> Poslata je [boja]: "+colorData.hex).removeClass('nev');
              }
          });


  },
  deleteItem: function(id) {
    $('#feedback').html("").addClass('nev');
    $('#success').html("").addClass('nev');
      $.ajax({
          url: window.base_url+'/colors',
          type: 'DELETE',
          data: id,
          success: function(data) {
              $('#success').html("Uspesno obrisano!").removeClass('nev');

          },
          error: function(xhr, status, error) {
              $("#feedback").html("Dogodila se greska - "+ xhr.status + "<br/> Poslat je [id]: "+id).removeClass('nev');
          }
      });
  },
  editItem: function(id) {
    $('#feedback').html("").addClass('nev');
    $('#success').html("").addClass('nev');
      this.formData.isInsert = false;
      this.formData.id = id;
      for(var i=0;i<this.bojaBazaPodaci.length;i++){
        if(this.bojaBazaPodaci[i]['id'] == id){
          this.formData.hex = this.bojaBazaPodaci[i]['hex'];
        break;
      }
    }

  }
},
beforeMount() {
    this.dohvati()
}
}

var colorDbData = {
   colors: [{
        id: 1,
        hex: '#0099CC'
    },
    {
        id: 2,
        hex: '#000000'
    }
]};
var colorData = {
    id : 1,
    hex: "#0099CC",
    errors: [],
    isInsert: true,
    hasErrors: false,
    success: false
};

</script>
