<template>
  <div>
  <button @click='get'>Dohvati</button>
  <button @click='insert'>Dodaj</button>
  <ul v-for='p in podaci.categories'>
    <li>{{p.name}}</li>
  </ul>
</div>
</template>
<script>
export default{
  name: "Pera",
  data(){
    return {
    podaci :  podaciKategorija
    }
  },
  methods:{
    get : function(){
    $.ajax({
        url : 'http://localhost/blacksheep/public/index.php/admin/categories',
        type : 'GET',
        dataType : "json",
        success : function(data) {
            alert(data['categories'][0]['name']);
        },
        error : function(xhr, status, error) {
            alert(error)
        }
    });
  },
    insert : function(){
      console.log(this.podaci);
    $.ajax({
        url : 'http://localhost/blacksheep/public/index.php/admin/categories',
        type : 'POST',
        dataType : "json",
        data: this.podaci,
        success : function(data) {
            alert(data);
        },
        error : function(xhr, status, error) {
            alert(error)
        }
    });
    }
  }
}
var podaciKategorija = {
  category : [
    {
      id : 1,
      name : 'pera'
    }
  ],
   brand: [
     {
       id : 2,
       name : 'neca'
     }
   ],
    type: [
      {
        id : 3,
        name: 'tip'
      }
    ]

}

</script>
