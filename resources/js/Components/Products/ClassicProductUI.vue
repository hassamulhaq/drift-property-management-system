<template>
    <section class="">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap -mx-4">

                <!-- breadcrumbs -->
                <div class="w-full px-4">
                    <ul class="flex flex-wrap items-center mb-4">
                        <li class="mr-6">
                            <a class="flex items-center text-sm font-medium text-gray-400 hover:text-gray-500" href="#">
                                <span>Home</span>
                                <svg class="ml-6" width="4" height="7" viewbox="0 0 4 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.150291 0.898704C-0.0500975 0.692525 -0.0500975 0.359292 0.150291 0.154634C0.35068 -0.0507836 0.674443 -0.0523053 0.874831 0.154634L3.7386 3.12787C3.93899 3.33329 3.93899 3.66576 3.7386 3.8727L0.874832 6.84594C0.675191 7.05135 0.35068 7.05135 0.150292 6.84594C-0.0500972 6.63976 -0.0500972 6.30652 0.150292 6.10187L2.49888 3.49914L0.150291 0.898704Z" fill="currentColor"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="mr-6">
                            <Link :href="route('shop')" class="flex items-center text-sm font-medium text-gray-400 hover:text-gray-500">
                                <span>Shop</span>
                                <svg class="ml-6" width="4" height="7" viewbox="0 0 4 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.150291 0.898704C-0.0500975 0.692525 -0.0500975 0.359292 0.150291 0.154634C0.35068 -0.0507836 0.674443 -0.0523053 0.874831 0.154634L3.7386 3.12787C3.93899 3.33329 3.93899 3.66576 3.7386 3.8727L0.874832 6.84594C0.675191 7.05135 0.35068 7.05135 0.150292 6.84594C-0.0500972 6.63976 -0.0500972 6.30652 0.150292 6.10187L2.49888 3.49914L0.150291 0.898704Z" fill="currentColor"></path>
                                </svg>
                            </Link>
                        </li>
                        <li>
                            <span class="text-sm font-medium text-indigo-500 hover:text-indigo-600">
                                {{ product.title ?? product.name }}
                            </span>
                        </li>
                    </ul>
                </div>
                <!-- /_breadcrumbs -->

                <div class="w-full lg:w-1/2 px-4 mb-16 lg:mb-0">
                    <div class="flex -mx-4 flex-wrap items-center justify-between lg:justify-start lg:items-start xl:items-center">
                        <div class="w-full sm:w-auto min-w-max px-1.5 text-center flex sm:flex-col items-center justify-center">
                            <a class="inline-block sm:mb-12 mr-4 sm:mr-0 transform -rotate-90 sm:transform-none hover:text-darkBlueGray-400" href="#">
                                <svg width="12" height="8" viewbox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.54064 7.21015C1.18719 7.59662 0.615928 7.59662 0.265087 7.21015C-0.087058 6.82369 -0.0896663 6.19929 0.265087 5.81282L5.36206 0.289847C5.71421 -0.0966173 6.28416 -0.0966172 6.63892 0.289847L11.7359 5.81282C12.088 6.19785 12.088 6.82369 11.7359 7.21015C11.3824 7.59662 10.8112 7.59662 10.4603 7.21015L5.99853 2.68073L1.54064 7.21015Z" fill="currentColor"></path>
                                </svg>
                            </a>
                            <a class="h-30 block mb-4 mr-2 sm:mr-0" href="#">
                                <img class="h-full w-full" src="" alt="">
                            </a>
                            <a class="hidden sm:block h-30 mb-4 mr-2 sm:mr-0" href="#">
                                <img class="h-full w-full" src="" alt="">
                            </a>
                            <a class="hidden sm:block h-30 mb-4 mr-2 sm:mr-0 rounded-xl border-2 border-blueGray-500" href="#">
                                <img class="h-full w-full" src="" alt="">
                            </a>
                            <a class="h-30 block mb-4 sm:mb-12 mr-4 sm:mr-0" href="#">
                                <img class="h-full w-full" src="" alt="">
                            </a>
                            <a class="inline-block transform -rotate-90 sm:transform-none hover:text-darkBlueGray-400" href="#">
                                <svg width="12" height="8" viewbox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4594 0.289849C10.8128 -0.0966154 11.3841 -0.0966154 11.7349 0.289849C12.0871 0.676313 12.0897 1.30071 11.7349 1.68718L6.63794 7.21015C6.28579 7.59662 5.71584 7.59662 5.36108 7.21015L0.264109 1.68718C-0.0880364 1.30215 -0.0880363 0.676312 0.264109 0.289848C0.617558 -0.096616 1.18882 -0.0966159 1.53966 0.289848L6.00147 4.81927L10.4594 0.289849Z" fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="w-full sm:w-9/12 px-4">
                            <div v-if="product.attachment">
                                <img class="mb-5" src="" alt="">
                                <p class="text-sm text-gray-300">Image ALT</p>
                            </div>
                            <div v-else>
                                <PlaceholderImage/>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="w-full lg:w-1/2 px-4">
                    <div class="max-w-md mb-6">
                        <span class="text-xs text-gray-400 tracking-wider">SKU: {{product.sku}}</span>
                        <h1 class="mt-2 mb-2 text-3xl font-heading font-medium">
                            {{product.title}}
                        </h1>
                        <p class="flex items-center mb-6">
                            <span class="mr-2 text-2xl text-indigo-500 font-medium">{{product.price_prefix ?? 'PKR'}}</span>
                            <span class="text-3xl text-indigo-500 font-medium">
                                <template v-if="product.second_price !== null">
                                    {{ product.second_price }}
                                </template>
                                <template v-else>{{ product.price }}</template>
                            </span>
                        </p>
                        <p class="text-lg text-gray-400">{{product?.short_description}}</p>
                    </div>

                    <div v-if="product.rating" class="flex mb-6 items-center">
                        <div class="inline-flex mr-4">
                            <button class="mr-1">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 7.91679H12.4167L10 0.416779L7.58333 7.91679H0L6.18335 12.3168L3.81668 19.5835L10 15.0835L16.1834 19.5835L13.8167 12.3168L20 7.91679Z" fill="#C1C9D3"></path>
                                </svg>
                            </button>
                            <button class="mr-1">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 7.91679H12.4167L10 0.416779L7.58333 7.91679H0L6.18335 12.3168L3.81668 19.5835L10 15.0835L16.1834 19.5835L13.8167 12.3168L20 7.91679Z" fill="#C1C9D3"></path>
                                </svg>
                            </button>
                            <button class="mr-1">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91679H12.4167L10 0.416779L7.58333 7.91679H0L6.18335 12.3168L3.81668 19.5835L10 15.0835L16.1834 19.5835L13.8167 12.3168L20 7.91679Z"
                                        fill="#C1C9D3"></path>
                                </svg>
                            </button>
                            <button class="mr-1">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91679H12.4167L10 0.416779L7.58333 7.91679H0L6.18335 12.3168L3.81668 19.5835L10 15.0835L16.1834 19.5835L13.8167 12.3168L20 7.91679Z"
                                        fill="#C1C9D3"></path>
                                </svg>
                            </button>
                            <button>
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7.91679H12.4167L10 0.416779L7.58333 7.91679H0L6.18335 12.3168L3.81668 19.5835L10 15.0835L16.1834 19.5835L13.8167 12.3168L20 7.91679Z"
                                        fill="#C1C9D3"></path>
                                </svg>
                            </button>
                        </div>
                        <span class="text-md text-gray-400">4.59</span>
                    </div>
                    <div v-if="product.type_variable" class="mb-6">
                        <h4 class="mb-3 font-heading font-medium">
                            <span>Color:</span>
                            <span class="text-gray-400">Silver</span>
                        </h4>
                        <button class="inline-flex items-center justify-center p-1 rounded-full border border-gray-300">
                            <div class="w-6 h-6 rounded-full bg-white"></div>
                        </button>
                        <button class="inline-flex items-center justify-center p-1 rounded-full border border-transparent">
                            <div class="w-6 h-6 rounded-full bg-orange-800"></div>
                        </button>
                        <button class="inline-flex items-center justify-center p-1 rounded-full border border-transparent">
                            <div class="w-6 h-6 rounded-full bg-indigo-900"></div>
                        </button>
                        <button class="inline-flex items-center justify-center p-1 rounded-full border border-transparent">
                            <div class="w-6 h-6 rounded-full bg-yellow-500"></div>
                        </button>
                    </div>

                    <div class="mb-10">
                        <AddToCart :product="product"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-details mt-6">
            <h3 class="text-2xl mb-1.5">More Details</h3>
            <div class="flex gap-2">
                <span class="font-semibold">Size</span>
                <span>{{ product?.size ?? 'N/A' }}</span>
                <span>{{ product?.size_prefix ?? 'ft' }}</span>
            </div>
            <div class="flex gap-2">
                <span class="font-semibold">Land</span>
                <span>{{ product?.land_postfix ?? 'ft' }}</span>
                <span>{{ product?.land }}</span>
            </div>
            <div class="flex gap-2">
                <span class="font-semibold">bedrooms</span>
                <span>{{ product?.bedrooms ?? 0 }}</span>
            </div>
            <div class="flex gap-2">
                <span class="font-semibold">Garage</span>
                <span>{{ product?.garage ?? 0 }}</span>
            </div>
            <div class="flex gap-2">
                <span class="font-semibold">Garage Size</span>
                <span>{{ product?.garage_size ?? 0 }}</span>
            </div>
            <div class="flex gap-2">
                <span class="font-semibold">year</span>
                <span>{{ product?.year ?? 'N/A' }}</span>
            </div>
            <div class="map flex gap-2" v-if="product.map !== null">
                <iframe src="https://{{product?.map_address}}"></iframe>
            </div>
            <div class="flex gap-2">
                <span class="font-semibold">Address</span>
                <span>{{ product?.address ?? 'N/A' }}</span>
            </div>
            <div class="flex gap-2">
                <span class="font-semibold">Zip</span>
                <span>{{ product?.zip ?? 'N/A' }}</span>
            </div>
        </div>

    </section>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import PlaceholderImage from "@/Components/PlaceholderImage.vue";
import AddToCart from "@/Pages/Frontend/Shop/_partials/AddToCart.vue";

export default {
    name: "ClassicProductUI",
    components: {AddToCart, PlaceholderImage, Link},
    props: {
        product: {
            type: Object,
            required: false
        },
    }
}
</script>

<style scoped>

</style>
