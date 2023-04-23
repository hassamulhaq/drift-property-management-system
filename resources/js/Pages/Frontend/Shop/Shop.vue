<template>
    <Head title="Shop"/>

    <FrontendAppLayout>
        <div class="max-w-7xl max-w-screen-2xl mx-auto px-4 pb-4 sm:px-6 lg:px-8">
            <div class="mt-8">
                <h2 class="text-xl leading-snug text-slate-800 font-bold mb-5">SHOP</h2>
                <div class="grid grid-cols-12 gap-6">
                    <!-- Cards -->
                    <template v-if="products?.data?.length">
                        <div v-for="(product) in products?.data" :key="product.id"
                             class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-slate-200 overflow-hidden">
                            <div class="flex flex-col h-full">
                                <!-- Image -->
                                <div v-if="product?.product_property?.media">
                                    <img class="w-full" src="{{product?.product_property?.media[0]}}" width="286" height="160" alt="Product">
                                </div>
                                <div v-else>
                                    <PlaceholderImage class="w-full h-full"/>
                                </div>

                                <!-- Card Content -->
                                <div class="grow flex flex-col p-5">
                                    <!-- Card body -->
                                    <div class="grow">
                                        <!-- Header -->
                                        <header class="mb-3">
                                            <h3 class="text-lg text-slate-800 font-semibold">
                                                {{ product.product_property?.title }}
                                            </h3>
                                        </header>
                                        <!-- Rating and price -->
                                        <div class="flex flex-wrap justify-between items-center mb-4">
                                            <!-- Rating -->
                                            <div class="flex items-center space-x-2 mr-2">
                                                <!-- Stars -->
                                                <div class="flex space-x-1">
                                                    <button>
                                                        <span class="sr-only"></span>
                                                        <svg class="w-4 h-4 fill-current text-amber-500"
                                                             viewBox="0 0 16 16">
                                                            <path
                                                                d="M10 5.934L8 0 6 5.934H0l4.89 3.954L2.968 16 8 12.223 13.032 16 11.11 9.888 16 5.934z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <!-- Rate -->
                                                <div class="inline-flex text-sm font-medium text-amber-600">
                                                    SKU: {{ product?.product_property?.sku }}
                                                </div>
                                            </div>
                                            <!-- Price -->
                                            <div>
                                                <div
                                                    class="inline-flex text-lg font-medium bg-emerald-100 text-emerald-600 rounded-full text-center px-2 py-0.5">
                                                    {{ product?.product_property?.price_prefix ?? 'PKR' }}
                                                    {{ product?.product_property?.price }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Features list -->
                                        <ul class="text-sm space-y-2 mb-5">
                                            <li class="flex items-center">
                                                <svg class="w-4 h-4 fill-current text-slate-400 shrink-0 mr-3"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.686 5.695L10.291.3c-.4-.4-.999-.4-1.399 0s-.4.999 0 1.399l.6.599-6.794 3.697-1-1c-.4-.399-.999-.399-1.398 0-.4.4-.4 1 0 1.4l1.498 1.498 2.398 2.398L.6 13.988 2 15.387l3.696-3.697 3.997 3.996c.5.5 1.199.2 1.398 0 .4-.4.4-.999 0-1.398l-.999-1 3.697-6.694.6.6c.599.6 1.199.2 1.398 0 .3-.4.3-1.1-.1-1.499zM8.493 11.79L4.196 7.494l6.695-3.697 1.298 1.299-3.696 6.694z"></path>
                                                </svg>
                                                <div>ZIP Code: {{ product?.product_property?.zip }}</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Card footer -->
                                    <div>
                                        <Link :href="route('products.single-product', product?.id )"
                                              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest disabled:opacity-25 transition bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-1 focus:ring-offset-indigo-50 text-white font-semibold rounded w-full sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400">
                                            Add To Cart
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <PaginationNumeric class="my-6" :links="products?.links"/>
        </div>
    </FrontendAppLayout>
</template>

<script>
import FrontendAppLayout from "@/Layouts/FrontendAppLayout.vue";
import Alert from "@/Components/Alert.vue";
import {Head, Link} from '@inertiajs/vue3';
import PaginationNumeric from "@/Components/PaginationNumeric.vue";
import PlaceholderImage from "@/Components/PlaceholderImage.vue";

export default {
    name: "Shop",
    components: {PlaceholderImage, PaginationNumeric, Alert, FrontendAppLayout, Link, Head},
    props: {
        products: {
            type: Object,
            required: false
        },
    },
    setup(props) {

        return {}
    }
}
</script>
