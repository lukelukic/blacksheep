<template>
  <div>
    <wysiwyg v-model="niz.text">
      <input type='text'/>
    </wysiwyg>
  </div>
</template>
<script>
export default{
  data: function() {
    return niz;
  }
}
var niz = {
  text: 'text'
}
</script>
