<template>
    <Head title="Shop" />

    <FrontendAppLayout>
        <div class="max-w-7xl max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-8">
            <h2 class="text-xl leading-snug text-slate-800 font-bold mb-5">SHOP</h2>
            <div class="grid grid-cols-12 gap-6">
                <!-- Cards -->
                <template v-if="products.length">
                    <div v-for="product in products" :key="product.id" class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-slate-200 overflow-hidden">
                    <div class="flex flex-col h-full">
                        <!-- Image -->
                        <img class="w-full" src="/content/media/sample-01.jpg" width="286" height="160" alt="Product">
                        <!-- Card Content -->
                        <div class="grow flex flex-col p-5">
                            <!-- Card body -->
                            <div class="grow">
                                <!-- Header -->
                                <header class="mb-3">
                                    <h3 class="text-lg text-slate-800 font-semibold">
                                        {{ product?.published_product_property?.title }}
                                    </h3>
                                </header>
                                <!-- Rating and price -->
                                <div class="flex flex-wrap justify-between items-center mb-4">
                                    <!-- Rating -->
                                    <div class="flex items-center space-x-2 mr-2">
                                        <!-- Stars -->
                                        <div class="flex space-x-1">
                                            <button>
                                                <span class="sr-only">2 stars</span>
                                                <svg class="w-4 h-4 fill-current text-amber-500" viewBox="0 0 16 16">
                                                    <path d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- Rate -->
                                        <div class="inline-flex text-sm font-medium text-amber-600">
                                            SKU: {{ product?.published_product_property?.sku }}
                                        </div>
                                    </div>
                                    <!-- Price -->
                                    <div>
                                        <div class="inline-flex text-lg font-medium bg-emerald-100 text-emerald-600 rounded-full text-center px-2 py-0.5">
                                            {{ product?.published_product_property?.price_prefix ?? 'PKR' }}
                                            {{ product?.published_product_property?.price }}
                                        </div>
                                    </div>
                                </div>
                                <!-- Features list -->
                                <ul class="text-sm space-y-2 mb-5">
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 fill-current text-slate-400 shrink-0 mr-3" viewBox="0 0 16 16">
                                            <path d="M15.686 5.695L10.291.3c-.4-.4-.999-.4-1.399 0s-.4.999 0 1.399l.6.599-6.794 3.697-1-1c-.4-.399-.999-.399-1.398 0-.4.4-.4 1 0 1.4l1.498 1.498 2.398 2.398L.6 13.988 2 15.387l3.696-3.697 3.997 3.996c.5.5 1.199.2 1.398 0 .4-.4.4-.999 0-1.398l-.999-1 3.697-6.694.6.6c.599.6 1.199.2 1.398 0 .3-.4.3-1.1-.1-1.499zM8.493 11.79L4.196 7.494l6.695-3.697 1.298 1.299-3.696 6.694z"></path>
                                        </svg>
                                        <div>ZIP Code: {{ product?.published_product_property?.zip }}</div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Card footer -->
                            <div>
                                <Link :href="route('products.single-product', product?.id )" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"> Add To Cart</Link>
                            </div>
                        </div>
                    </div>
                </div>
                </template>
            </div>
        </div>
        </div>
    </FrontendAppLayout>
</template>

<script>
import FrontendAppLayout from "@/Layouts/FrontendAppLayout.vue";
import Alert from "@/Components/Alert.vue";
import { Head, Link } from '@inertiajs/vue3';

export default {
    name: "Shop",
    components: {Alert, FrontendAppLayout, Link},
    props: {
        products: {
            type: Object,
            required: false
        },
    },
    setup(props) {

        return {
            alert,
        }
    }
}
</script>
