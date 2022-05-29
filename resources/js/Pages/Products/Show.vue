<script setup>
import Header from "./Partials/Header.vue";
import Products from '@/shared/Products.vue';
defineProps({
    'product': Object,
    'products': Array,
});
</script>

<template>
<Header :product="product" />
<Products :products="products" msg="might also like" />

</template>


<style>

</style>
