<script setup>
let props=defineProps(['content','total','subtotal','tax'])
console.log(props)

</script>
<template>
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="p-8 lg:p-20 bg-white">
                <h2 class="mb-20 text-5xl font-bold font-heading">Save For Later cart</h2>
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full xl:w-8/12 mb-8 xl:mb-0 px-4">
                        <div class="hidden lg:flex w-full">
                            <div class="w-full lg:w-3/6">
                                <h4 class="mb-6 font-bold font-heading text-gray-500">Description</h4>
                            </div>
                            <div class="w-full lg:w-1/6">
                                <h4 class="mb-6 font-bold font-heading text-gray-500">Price</h4>
                            </div>
                            <div class="w-full lg:w-1/6 text-center">
                                <h4 class="mb-6 font-bold font-heading text-gray-500">Quantity</h4>
                            </div>
                            <div class="w-full lg:w-1/6 text-right">
                                <h4 class="mb-6 font-bold font-heading text-gray-500">Subtotal</h4>
                            </div>
                        </div>
                        <div class="mb-12 py-6 border-t border-b border-gray-200">


                            <div v-for="(product,id) in props.content" :key="id" class="flex flex-wrap items-center -mx-4">
                                <div class="w-full md:w-4/6 lg:w-6/12 px-4 mb-6 md:mb-0">
                                    <div class="flex -mx-4 flex-wrap items-center">
                                        <div class="w-full md:w-1/3 px-4 mb-3">
                                            <div class="flex items-center justify-center w-full md:w-24 h-32 bg-gray-100">
                                                <img class="h-full object-contain" :src="product.image" alt="">
                                            </div>
                                            <div>
                                                <Link class="text-blue-300"  as="button" method="delete" :href="route('saveForLater.delete',{id:product.rowId})"> Remove</Link>
                                                <Link class="text-blue-300"  as="button" method="put" :href="route('saveForLater.delete',{id:product.rowId})"> to default cart</Link>
                                            </div>
                                        </div>
                                        <div class="w-full md:w-2/3 px-4">
                                            <h3 class="mb-2 text-xl font-bold font-heading">{{ product.name }}</h3>
                                            <p class="text-gray-500">{{product.description.substr(0,12)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden lg:block lg:w-2/12 px-4">
                                    <p class="text-lg text-blue-500 font-bold font-heading">${{product.price*1.21}}</p>
                                    <span class="text-xs text-gray-500 line-through">${{Math.round(product.price*1.3, 2).toFixed(2)}}</span>
                                </div>
                                <div class="w-auto md:w-1/6 lg:w-2/12 px-4">
                                    <div class="inline-flex items-center px-4 font-semibold font-heading text-gray-500 border border-gray-200 focus:ring-blue-300 focus:border-blue-300 rounded-md">
                                        <button class="py-2 hover:text-gray-700">
                                            <svg width="12" height="2" viewbox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.35"><rect x="12" width="2" height="12" transform="rotate(90 12 0)" fill="currentColor"></rect></g></svg>
                                        </button>
                                        <input class="w-12 m-0 px-2 py-4 text-center md:text-right border-0 focus:ring-transparent focus:outline-none rounded-md" type="number" placeholder="1">
                                        <button class="py-2 hover:text-gray-700">
                                            <svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.35"><rect x="5" width="2" height="12" fill="currentColor"></rect><rect x="12" y="5" width="2" height="12" transform="rotate(90 12 5)" fill="currentColor"></rect></g></svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="w-auto md:w-1/6 lg:w-2/12 px-4 text-right">
                                    <p class="text-lg text-blue-500 font-bold font-heading">${{product.price}}</p>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="w-full xl:w-4/12 px-4">~
                        <div class="p-6 md:p-12 bg-blue-300">
                            <h2 class="mb-6 text-4xl font-bold font-heading text-white">Cart totals</h2>
                            <div class="flex mb-8 items-center justify-between pb-5 border-b border-blue-100">
                                <span class="text-blue-50">Subtotal</span>
                                <span class="text-xl font-bold font-heading text-white">${{subtotal}}</span>
                            </div>
                            <h4 class="mb-2 text-xl font-bold font-heading text-white">TAX</h4>
                            <div class="flex mb-2 justify-between items-center">
                                <span class="text-xl font-bold font-heading text-white">${{tax}}</span>
                            </div>
                            <div class="flex mb-10 justify-between items-center">
                                <span class="text-blue-50">Shipping to United States</span>
                                <span class="text-xl font-bold font-heading text-white">-</span>
                            </div>
                            <div class="flex mb-10 justify-between items-center">
                                <span class="text-xl font-bold font-heading text-white">Order total</span>
                                <span class="text-xl font-bold font-heading text-white">${{total}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

