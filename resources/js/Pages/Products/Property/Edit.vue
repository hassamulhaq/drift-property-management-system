<template>
    <AppLayout title="Edit Property">

        <div class="component-wrapper">
            <CreateEditPropertyForm :product="product" :collections="collections"/>
        </div>
    </AppLayout>
</template>

<script>
import CreateEditPropertyForm from "@/Pages/Products/Property/Partials/CreateEditPropertyForm.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    name: "Edit",
    components: {AppLayout, CreateEditPropertyForm},
    props: {
        collections: {
            type: Object,
            required: true
        },
        product: {
            type: Object,
            required: true
        },
    }
}
</script>

<style scoped>

</style>
