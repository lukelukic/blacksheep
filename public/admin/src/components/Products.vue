<template>
  <div>
  <div class='col-md-6'>
    <table class='table table-hover table-condensed'>
      <thead>
        <th>Naziv</th>
        <!-- <th>Slika</th> -->
        <th>Izmeni</th>
        <th>Obrisi</th>
      </thead>
      <tbody>
        <tr v-for='p in podaci.products'>
          <td>{{p.name}}</td>
          <!-- <td v-for='slika in p'><img :src='slika.file' width='50' :alt='slika.alt'/></td> -->
          <td><button type='button' @click='preEdit(p.id)'><i class='fa fa-edit'></i></button></td>
          <td><button type='button' @click='preRemove(p.id)'><i class='fa fa-remove'></i></button></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class='col-md-6'>
      <hr>
    <h5>Unos proizvoda</h5>
    <table class='table table-striped'>
      <tr>
        <td><label for='name'>Naziv:</label></td>
        <td><input type='text' name='name' id='name' class='form-control' placeholder="Naziv proizvoda" v-model='forma.name' /></td>
        <td><i>Izdvojen?</i><input type='checkbox' class='form-control' v-model='forma.special'/></td>
      </tr>
      <tr>
        <td><label for='description'>Opis:</label></td>
        <td><textarea name='description' id='description' class='form-control' placeholder="Opis proizvoda" v-model='forma.description'/></td>
      </tr>
      <tr v-if='forma.is_offer == 0'>
        <td><label for='price'>Cena:</label></td>
        <td><input type='text' name='price' id='price' class='form-control' placeholder="Cena proizvoda" v-model='forma.price'/></td>
        <td><i>Akcija?</i><input type='checkbox' class='form-control' v-model='forma.is_offer'/></td>
      </tr>
      <tr v-else>
        <td><label for='price'>Cena:</label></td>
        <td><input type='text' name='price' id='price' class='form-control' placeholder="Akcijska cena proizvoda" v-model='forma.price'/></td>
        <td><span>Akcija?</span><input type='checkbox' class='form-control' v-model='forma.is_offer'/></td>
      </tr>
      <tr>
        <td><label for='picture'>Slika:</label></td>
        <td><input class='form-control' type='file' name='file' id='file'/></td>
      </tr>
      <tr>
        <td><label for='color'>Boja?</label></td>
        <td><input type='checkbox' class='form-control chbWidth' v-model='forma.bojanJe'/></td>
      </tr>
      <tr v-if='forma.bojanJe'>
        <td>Izaberi:</td>
        <td>
          <table>
            <tr>
          <td v-for='c in forma.colors'><label class='label-for-check' v-bind:style={background:c.hex}><input type='checkbox' name='chooseColor' v-model='c.checked'    :value='c.id' :id='c.id' class='form-control chbWidth  check-with-label'/></label></td>
        </tr>
      </table>
        </td>
      </tr>
      <tr>
        <td><label for='brand'>Brend:</label></td>
        <td><select v-model='forma.brand_id' class='form-control' id='brand'><option value='0'>Izaberite brend</option><option :value=b.id v-for='b in forma.brand' >{{b.name}}</option></select></td>
      </tr>
      <tr>
        <td><label for='tip'>Tip:</label></td>
        <td><select v-model='forma.type_id' class='form-control' id='tip'><option value='0'>Izaberite tip</option><option :value=t.id v-for='t in forma.type' >{{t.name}}</option></select></td>
      </tr>
      <tr>
        <td align='center' colspan='2'><button type='button' @click='unesi' class='btn btn-success'>Unesi</button></td>
      </tr>
    </table>

  </div>
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
            forma: formData
            // errors: []
        }
    },
    methods: {
      unesi : function(){
        this.unos.name = this.forma.name;
        this.unos.description = this.forma.description;
        if(this.forma.is_offer) {
          this.unos.is_offer = 1;
          this.unos.prices.push(this.forma.price);
        }else{this.unos.prices.push(this.forma.price);}
        var fileInput = document.getElementById('file');
        this.unos.picture[0].file =  fileInput.files[0]['name'];
        this.unos.picture[0].alt = this.forma.name;
        this.unos.picture[0].id = this.forma.picture_id;
        if(this.forma.special){
          this.unos.special = 1;
        }
        if(this.forma.brand_id!=0){
          this.unos.brand_id = this.forma.brand_id;
          this.unos.brand[0].id = this.forma.brand_id;
          this.unos.brand[0].name = this.forma.brand[0].name;
        }
        if(this.forma.type_id!=0){
          this.unos.type_id = this.forma.type_id;
          this.unos.type[0].id = this.forma.brand_id;
          this.unos.type[0].name = this.forma.type[0].name;
        }
        for(var i=0;i<this.forma.colors.length;i++){
          console.log('Boje '+this.forma.colors[i]);
        }


        console.log(this.unos);
        // $.ajax({
        //     url: 'http://localhost/blacksheep/public/index.php/admin/products',
        //     type: 'POST',
        //     dataType: "json",
        //     data: this.unos,
        //     success: function(data) {
        //         $("#cat").html("Kategorija uspešno uneta!").removeClass('nev');
        //       },
        //     error: function(xhr, status, error) {
        //       switch (xhr.status) {
        //         case 201:
        //         $("#cat").html("Kategorija uspešno uneta!").removeClass('nev');
        //         break;
        //         case 400:
        //         $("#cat").html("Kategorija sa istim imenom već postoji!").removeClass('nev');
        //           break;
        //         default:
        //         $("#err").html("Dogodila se greska - "+ xhr.status).removeClass('nev');
        //       }
        //
        //     }
        // });

      },
      dohvati: function() {
          $.ajax({
              url: 'http://localhost/blacksheep/public/index.php/admin/products',
              type: 'GET',
              dataType: "json",
              success: function(data) {
                  sviPodaci.products = data.products;
                  console.log(data);
              },
              error: function(xhr, status, error) {
                  $("#err").html("Greska u dohvatanju podataka iz baze!");
              }
          });
      }
    },
    beforeMount() {
        this.dohvati()
    }
  }


var sviPodaci = {
  products : [{
  id : 1,
  name : 'Product',
  description: 'Opis',
  is_active: 1,
  is_offer: 0,
  special: 0,
  brand_id: 1,
  picture_id: 1,
  type_id: 1,
  brand: [{
    id: null,
    name: null
  }],
  picture: [{
    id : 1,
    file : 'http://en.ict.edu.rs/files/image/osoblje_skole/!markoDJ.jpg',
    alt : 'slicica'
  }],
  type: [{
    id : null,
    name : null
  }],
  prices: ['1500'], //ovisno od is_offer
  colors:[{
    id: 1,
    hex: '#ff0000'
  }]
}]}
var formData = {
  name : '',
  description: '',
  is_active : 1,
  is_offer : 0,
  special : 0,
  brand_id : 0,
  picture_id: 0,
  type_id : 0,
  brand : [{
    id : 1,
    name : 'brend'
  }],
  picture: [{
    id : 1,
    name : 'slika',
    file: 'p4.jpg',
    alt : 'slika'
  }],
  type:[{
    id : 1,
    name : 'tip'
  }],
  prices:[],
  colors:[{
    id: 1,
    hex: '#ff0000',
    checked:false
  },
  {
    id :2,
    hex: '#0099cc',
    checked:true
  },
  {
    id :2,
    hex: '#ee55cc',
    checked:false
  },
  {
    id :2,
    hex: '#ffffff',
    checked:true
  },
  {
    id :2,
    hex: '#000000',
    checked: false
  },
  {
    id :2,
    hex: '#cccccc',
    checked: true
  },
  {
    id :2,
    hex: '#999999',
    checked: true
  }],

  bojanJe:false
}

var dodavanjePodataka = {
    name : '',
    description: '',
    is_active : 1,
    is_offer : 0,
    special : 0,
    brand_id : 0,
    picture_id: 0,
    type_id : 0,
    brand : [{
      id : 1,
      name : 'brend'
    }],
    picture: [{
      id : 1,
      name : 'slika',
      file: 'p4.jpg',
      alt : 'slika'
    }],
    type:[{
      id : 1,
      name : 'tip'
    }],
    prices:[],
    colors:[{
      id: 1,
      hex: '#ff0000'
    }]
}
var brisanjePodataka = {
    id: ''
}
var izmenaPodataka = {
    id : 1,
    name : '',
    description: '',
    is_active : 1,
    is_offer : 0,
    special : 0,
    brand_id : 0,
    picture_id: 0,
    type_id : 0,
    brand : [{
      id : 1,
      name : 'brend'
    }],
    picture: [{
      id : 1,
      name : 'slika',
      file: 'p4.jpg',
      alt : 'slika'
    }],
    type:[{
      id : 1,
      name : 'tip'
    }],
    prices:[],
    colors:[{
      id: 1,
      hex: '#ff0000',
      checked: false
    }]
}
</script>
