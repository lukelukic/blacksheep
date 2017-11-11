<template>
  <div>
        <div class='col-md-12 title'>Admin - Akcije</div>
    <div class='col-md-12'>
      <table class='table table-hover table-bordered'>
        <thead>
          <th>Preko</th>
          <th>Proizvod</th>
          <th>Potvrdi</th>
        </thead>
        <tbody>
        <tr>
          <td>1000</td>
          <td><input type='text' class='form-control' id='poklon1' v-model='poklon.poklon1' :value='poklon.poklon1'/></td>
          <td><button class='btn btn-success btn-xs' @click='setData(1)'><i class='fa fa-check'></i></button></td>
        </tr>
        <tr>
          <td>1500</td>
          <td><input type='text' class='form-control' id='poklon2' v-model='poklon.poklon2' :value='poklon.poklon2'/></td>
          <td><button class='btn btn-success btn-xs' @click='setData(2)'><i class='fa fa-check'></i></button></td>
        </tr>
        <tr>
          <td>2000</td>
          <td><input class='form-control' type='text' id='poklon3' v-model='poklon.poklon3' :value='poklon.poklon3'/></td>
          <td><button class='btn btn-success btn-xs' @click='setData(3)'><i class='fa fa-check'></i></button></td>
        </tr>
      </tbody>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  data:function(){
    return{
      poklon : poklon
    }
  },
  methods:{
    setData(i){
      switch (i) {
        case 1:
        window.poklon=this.poklon.poklon1;
          break;
        case 2:
        window.poklon=this.poklon.poklon2;
        break;
        case 3:
        window.poklon=this.poklon.poklon1;
        break;
        default:
      }
    }
  }
}
var poklon = {
  poklon1 : 'a',
  poklon2 : '',
  poklon3 : ''
}
</script>
