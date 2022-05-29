<script setup>
defineProps({
    'products': {
        type: Array,
        default: () => []
    },
    'msg': {
        type: String,
        default: () => 'Discover our products'
    },
});
</script>

<template>
  <section class="py-20 bg-gray-100">
  <div class="container mx-auto px-4">
    <h2 class="mb-16 md:mb-24 text-4xl md:text-5xl font-bold font-heading">{{msg}}</h2>
    <div class="flex flex-wrap -mx-3 mb-24">
    <!-- <div class="grid grid-cols-4 gap-3 "> -->

      <div v-for="(product,index) in products" :key="index" class="w-full my-8 md:w-1/2 lg:w-1/4 px-3 mb-6 lg:mb-0">
        <div class="p-6 shadow-sm hover:shadow-xl bg-white">
          <span class="px-2 py-1 text-xs font-bold font-heading border-2 border-red-500 rounded-full bg-gray-50 text-red-500 ">-15%</span>
          <a class="block px-6 mt-6 mb-2" href="#">
             <Link :href="route('products.show',product)">
                 <img class="mb-5 mx-auto h-56 w-full object-contain"
                      :src="product.image" alt="">
            </Link>
            <h3 class="mb-2 text-xl font-bold font-heading">{{product.name}}</h3>
            <p class="text-lg font-bold font-heading text-blue-500 space-x-4">
              <span>${{product.price}}</span>
              <span class="text-xs text-gray-500 font-semibold font-heading line-through">${{product.price-product.price*.15}}</span>
            </p>
          </a>
          <a class="ml-auto mr-2 flex items-center justify-center w-12 h-12 border rounded-lg hover:border-gray-500" href="#">
            <svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="5" width="2" height="12" fill="#161616"></rect><rect x="12" y="5" width="2" height="12" transform="rotate(90 12 5)" fill="#161616"></rect></svg>
          </a>
        </div>
      </div>

    </div>
    <div class="text-center">
      <a class="inline-block bg-orange-300 hover:bg-orange-400 text-white font-bold font-heading py-6 px-8 rounded-md uppercase" href="#">Show More</a>
    </div>
  </div>
</section>

</template>

