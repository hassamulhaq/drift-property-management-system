<template>
    <DriftAppLayout title="Create User">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Team
            </h2>
        </template>
        <CreateEditTeamForm :users="users"/>
    </DriftAppLayout>
</template>

<script>
import DriftAppLayout from "@/Layouts/DriftAppLayout.vue";
import CreateEditTeamForm from "@/Pages/Users/Partials/CreateEditTeamForm.vue";

export default {
    name: "CreateTeam",
    components: {CreateEditTeamForm, DriftAppLayout},
    props: {
        users: {
            type: Object,
            required: true
        }
    },
}
</script>

<style scoped>

</style>
