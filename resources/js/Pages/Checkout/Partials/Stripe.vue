
<script>
let stripe = Stripe(`YOUR_STRIPE_PUBLISHABLE_KEY`),
    elements = stripe.elements(),
    card = undefined;

export default {
    mounted: function () {
        card = elements.create('card');
        card.mount(this.$refs.card);
    }
};
</script>

<template>
    <div ref="card"></div>
</template>
<style scoped>

</style>
