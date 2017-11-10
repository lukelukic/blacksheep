<template>
  <div id="app">
    <Master/>
  </div>
</template>
<style src="./vendor/bootstrap/css/bootstrap.min.css"></style>
<style src="./vendor/font-awesome/css/font-awesome.min.css"></style>
<style src="./css/sb-admin.min.css"></style>
<style src="./css/vueWysiwyg.css"
<style src="./css/custom.css"></style>
<script>
import Master from './components/Master'
import Categories from './components/Categories'
import Brands from './components/Brands'
import Types from './components/Types'
import Products from './components/Products'
import Colors from './components/Colors'
import Orders from './components/Orders'
import CustomCase from './components/CustomCase'
import Slider from './components/Slider'
import Delivery from './components/Delivery'
import Special from './components/Special'
/* ROUTING */



export default {
  name: 'master',
  components: {
    Master,
    Categories,
    Brands,
    Types,
    Products,
    Colors,
    Orders,
    CustomCase,
    Slider,
    Delivery,
    Special
  }
}
</script>
