<template>
    <Head :title="product.id" />

    <FrontendAppLayout>
        <div class="max-w-7xl max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- {{ product }} -->
            <div class="py-2">
                <ClassicProductUI :product="product?.product_property" />
            </div>
        </div>
    </FrontendAppLayout>
</template>

<script>
import {Link, Head} from "@inertiajs/vue3";
import FrontendAppLayout from "@/Layouts/FrontendAppLayout.vue";
import ClassicProductUI from "@/Components/Products/ClassicProductUI.vue";

export default {
    name: "SingleProduct",
    components: {ClassicProductUI, FrontendAppLayout, Link, Head},
    props: {
        product: {
            type: Object,
            required: false
        },
    },
    setup(props) {

        return {

        }
    }
}
</script>

<style scoped>

</style>
