<template>
  <div>
        <div class='col-md-12 title'>Admin - Slajder</div>
    <div class='col-md-12'>
      <table class='table table-hover table-bordered'>
        <thead>
          <th>Fajl</th>
          <th>Trenutna</th>
        </thead>
        <tbody>
        <tr>
          <td><input type="file" id="file" ref="myFiles"  @change="changeIt(1)"></td>
          <td><img :src='slike.slides[0].img' width='100'/></td>
        </tr>
        <tr>
          <td><input type="file" id="file2" ref="myFiles2"  @change="changeIt(2)"></td>
          <td><img :src='slike.slides[1].img' width='100'/></td>
        </tr>
        <tr>
          <td><input type="file" id="file3" ref="myFiles3"  @change="changeIt(3)"></td>
          <td><img :src='slike.slides[2].img' width='100'/></td>
        </tr>
        <tr>
          <td><input type="file" id="file4" ref="myFiles4"  @change="changeIt(4)"></td>
          <td><img :src='slike.slides[3].img' width='100'/></td>
        </tr>
      </tbody>
      </table>
      <div id='err' class='alert alert-danger nev'></div>
      <p>Ovde onChange ide zurka</p>
    </div>
  </div>
</template>
<script>
export default {
  data(){
    return{
      files:[],
      slike: sliderImages
    }
  },
  methods: {
    changeIt(x) {
        var id ='';
      switch (x) {
        case 1:
          this.files = this.$refs.myFiles.files
          break;
        case 2:
          this.files = this.$refs.myFiles2.files
        case 3:
          this.files = this.$refs.myFiles3.files
        case 4:
          this.files = this.$refs.myFiles4.files
        default:
      }
        var self = this;
        $.ajax({
        url: window.base_url+'/slider',
        type: 'PATCH',
        processData: false,
        data: {
          id : x,
          img: this.files
        },
        dataType: 'json',
        success: function(data){
          // self.ucitaj();
        },
        error: function(xhr, status, error){
          $('#err').html('Dogodila se greska - '+xhr.status+", poslat [id]: "+x).removeClass('nev');
        }
      });


  },
  ucitaj : function(){
    var self = this;
    $.ajax({
      url: window.base_url+'/slider',
      type: 'GET',
      dataType: 'json',
      data: data,
      success: function(data){
        //ucitaj slike
      },
      error: function(xhr, status, error){
        $('#err').html('Dogodila se greska - '+xhr.status).removeClass('nev');
      }
    });
  },
  beforeMount(){
    this.ucitaj()
  }
  }
}
var sliderImages = {
  slides: [{
    id : 1,
    img: 'https://static.pexels.com/photos/17679/pexels-photo.jpg'
  },
  {
    id : 2,
    img: 'https://static.pexels.com/photos/17679/pexels-photo.jpg'
  },
  {
    id:3,
    img: 'https://static.pexels.com/photos/17679/pexels-photo.jpg'
  },
  {
    id:4,
    img: 'https://static.pexels.com/photos/17679/pexels-photo.jpg'
  }]
}
</script>

<style lang="css">
</style>
