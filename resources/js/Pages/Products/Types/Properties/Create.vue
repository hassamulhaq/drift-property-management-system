<template>
    <DriftAppLayout title="Create Property">

        <div class="component-wrapper">
            <CreateEditPropertyForm />
        </div>
    </DriftAppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import CreateEditPropertyForm from "@/Pages/Products/Types/Properties/Partials/CreateEditPropertyForm.vue";
import DriftAppLayout from "@/Layouts/DriftAppLayout.vue";
export default {
    name: "Create",
    components: {DriftAppLayout, CreateEditPropertyForm, AppLayout},
    props: {

    }
}
</script>

<style scoped>

</style>
