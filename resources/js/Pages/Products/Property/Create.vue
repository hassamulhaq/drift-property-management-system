<template>
    <AppLayout title="Create Property">

        <div class="component-wrapper">
            <CreateEditPropertyForm />
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import CreateEditPropertyForm from "@/Pages/Products/Property/Partials/CreateEditPropertyForm.vue";
export default {
    name: "Create",
    components: {CreateEditPropertyForm, AppLayout},
    props: {

    }
}
</script>

<style scoped>

</style>
