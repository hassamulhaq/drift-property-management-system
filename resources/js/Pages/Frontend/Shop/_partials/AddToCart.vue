<template>
    <div>
        <h4 class="mb-1.5 font-heading font-medium">Qty:</h4>
    </div>
    <form @submit.prevent="submit">
        <div class="flex flex-wrap -mx-2 mb-12">
            <div class="w-full md:w-2/3 px-2 mb-2 md:mb-0">
                <input type="hidden" name="product_id" id="product_id" :value="props?.product.product_id">
                <input type="hidden" name="product_uuid" id="product_uuid" :value="props?.product?.uuid">
                <input type="hidden" name="price" id="price" :value="props?.product?.price">
                <input type="hidden" name="second_price" id="second_price" :value="props?.product?.second_price">
                <input type="hidden" name="price_prefix" id="price_prefix" :value="props?.product?.price_prefix">
                <input type="hidden" name="price_postfix" id="price_postfix" :value="props?.product?.price_postfix">
                <input type="hidden" name="meta_data" id="meta_data" :value="props?.product?.meta_data">

                <input v-model="form.qty"
                       type="number"
                       min="1"
                       class="w-24 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
            </div>
            <div class="w-full md:w-1/3 px-2">
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                </progress>
                <input
                    type="submit"
                    value="Add to Cart"
                    class="flex items-center justify-center cursor-pointer bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-indigo-50 text-white font-semibold h-10 px-6 rounded-lg w-full sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400"
                    :disabled="form.processing"
                >
            </div>
        </div>
    </form>
</template>

<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps([
    'product'
])

const form = reactive({
    product_id: props.product.product_id,
    product_uuid: props.product.uuid,
    price: props.product.price,
    second_price: props.product?.second_price,
    price_prefix: props.product?.price_prefix,
    price_postfix: props.product?.price_postfix,
    meta_data: props.product?.meta_data,
    qty: 1
})
function submit() {
    router.post('/add-to-cart', form)
}
</script>

<style scoped>

</style>
