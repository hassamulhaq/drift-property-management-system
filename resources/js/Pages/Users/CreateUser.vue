<template>
    <DriftAppLayout title="Create User">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create User
            </h2>
        </template>
        <CreateEditUserForm :user="user" :roles="roles"/>
    </DriftAppLayout>
</template>

<script>
import DriftAppLayout from "@/Layouts/DriftAppLayout.vue";
import CreateEditUserForm from "@/Pages/Users/Partials/CreateEditUserForm.vue";

export default {
    name: "CreateUser",
    components: {CreateEditUserForm, DriftAppLayout},
    props: {
        user: {
            type: Object,
            required: false
        },
        roles: {
            type: Object,
            required: true
        }
    },
}
</script>

<style scoped>

</style>
