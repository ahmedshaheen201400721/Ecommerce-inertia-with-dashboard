<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let props=defineProps({
    'product': Object,
});
let form=useForm([])
function submit(){
    form.post(route('cart.store',{product:props.product}))
}
</script>
<template>
  <section class="relative overflow-x-hidden">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center">
      <div class="w-full md:w-1/2 lg:w-2/5 md:h-128 md:pr-8 mb-20 md:mb-0">
        <div class="pt-20 max-w-md">
          <h2 class="mt-6 mb-16 lg:mb-8 text-5xl font-bold font-heading">{{product.name}}</h2>
          <span class="mb-4 lg:mb-4 text-2xl">${{product.price}}</span>
          <h2 class="my-2 font-bold text-3xl">Description</h2>
          <p class="mt-6 mb-16 lg:mb-32 text-lg font-heading">{{product.description}}</p>
        <form @submit.prevent="submit">
            <button class="inline-block bg-orange-300 hover:bg-orange-400 text-white font-bold font-heading py-6 px-8 mx-6 rounded-md uppercase transition duration-200" >Add To Cart</button>
        </form>
        </div>
      </div>
      <div class="w-full h-64 md:h-128 md:w-1/2 lg:w-3/5">
        <img class="h-full w-full md:w-auto max-w-none object-cover"
             :src="product.image" alt="">
      </div>
    </div>
  </div>
</section>
</template>

