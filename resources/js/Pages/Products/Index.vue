<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Header from '@/shared/Header.vue';
import Products from '@/shared/Products.vue';

let props=defineProps({
    'products': {
        type: Array,
        default: () => []
    },

});
</script>

<script>
import layout from "@/Layouts/AppLayout.vue";
export default {
    layout:layout
}
</script>

<template>
    <Head title="Welcome" />
    <Header />
    <Products :products="products"  />

</template>

