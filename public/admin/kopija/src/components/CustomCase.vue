<template>
  <div>
        <div class='col-md-12 title'>Admin - Custom Case</div>
    <div class='col-md-12'>
      <table class='table table-hover table-bordered'>
        <thead>
          <th>Podaci</th>
          <th>Fotografija</th>
          <th>Gotovo</th>
        </thead>
        <tbody>
        <tr v-for='d in dbData'>
          <td>
            <ul>
              <li>{{d.user.firstName + " " + d.user.lastName}}</li>
              <li>{{d.user.phone}}</li>
              <li>{{d.user.address}}</li>
              <li>{{d.user.email}}</li>
              <li>{{d.user.city}}</li>
              <li>{{d.user.postNumber}}</li>
            </ul>
          </td>
          <td><img :src='d.picture.file' width='100' :alt='d.picture.alt'/></td>
          <td><button @click='potvrdi' class='btn btn-success btn-xs'><i class='fa fa-check'></i></button></td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
</template>
<script>
export default {
  data: function() {
      return {
          dbData : dbCustomCase.cases
      }
  },
  methods: {
    dohvati : function(){
      var self = this;
      $.ajax({
        url: window.base_url+'/custom-case',
        type:'GET',
        dataType: 'json',
        success: function(data){
          for(var i=0;i<data.cases.length;i++){
            data.cases[i].picture.file = 'http://localhost/blacksheep/public/assets/pages/img/products/'+data.cases[i].picture.file;
          }
          self.dbData = data.cases;
                    console.log(self.dbData);
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
var dbCustomCase = {
  cases: [{
    id : 1,
    created_at : new Date().toLocaleDateString(),
    picture_id : 1,
    order_status_id : 1,
    amount : 1,
    user : {
      id : 1,
      firstName : 'pera',
      lastName : 'mika',
      email : 'hehe',
      phone : '060',
      address: 'Vojvode',
      city : 'city',
      postNumber: '123123',
      picture : {
        id: 1,
        file: 'p4.jpg',
        alt: 'slika'
      },
      isAccepted : false
    }
  }]

}
</script>

<style lang="css">
</style>
