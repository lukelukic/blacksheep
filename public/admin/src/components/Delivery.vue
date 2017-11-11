<template>
  <div>
    <div class='col-md-12 title'>Admin - Dostava</div>
    <wysiwyg class='p20' v-model="niz.text"/>
    <button type='button' class='btn btn-success' @click='deliver'>Potvrdi</button>
  </div>
</template>
<script>
export default{
  data: function() {
    return {
      niz : niz
  }
},
methods :{
  deliver:function(){
    console.log(this.niz.text);
  }
}



}
var niz = {
  text: 'text'
}
</script>
