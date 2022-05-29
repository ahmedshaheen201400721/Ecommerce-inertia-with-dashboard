<script setup>
import AddToCart from "./Partials/AddToCart.vue";
import Products from '@/shared/Products.vue';
import AddToSaveForLater from "./Partials/AddToSaveForLater";

let props=defineProps({
    'products': Array,
    'default':Object,
    'saveForLater':Object,

});
console.log(props)
console.log(props.saveForLater.content)

</script>

<template>


<add-to-cart :tax="props.default.tax" :content="props.default.content" :total="props.default.total" :subtotal="props.default.subtotal"  v-if="props.default.content.length!=0" />
<div class="text-4xl text-center my-4 font-bold" v-else >
    The Cart is empty
</div>


<add-to-save-for-later :tax="saveForLater.tax" :content="saveForLater.content" :total="saveForLater.total" :subtotal="saveForLater.subtotal" v-if="props.saveForLater.content.length!=0" />

<Products :products="products" msg="might also like" />

</template>




