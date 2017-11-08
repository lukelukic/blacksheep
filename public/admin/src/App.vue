<template>
  <div id="app">
    <Master/>
  </div>
</template>
<style src="./vendor/bootstrap/css/bootstrap.min.css"></style>
<style src="./vendor/font-awesome/css/font-awesome.min.css"></style>
<style src="./css/sb-admin.min.css"></style>
<style src="./css/custom.css"></style>
<script>
import Master from './components/Master'
import Categories from './components/Categories'
import Brands from './components/Brands'
import Types from './components/Types'
import Products from './components/Products'
/* ROUTING */



export default {
  name: 'master',
  components: {
    Master,
    Categories,
    Brands,
    Types,
    Products
  }
}
</script>
