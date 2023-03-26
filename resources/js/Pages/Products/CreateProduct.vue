<template>
    <AppLayout title="Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Product
            </h2>
        </template>

    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    name: "CreateProduct",
    components: {AppLayout}
}
</script>

<style scoped>

</style>
