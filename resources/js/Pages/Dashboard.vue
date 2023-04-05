<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import DriftAppLayout from "@/Layouts/DriftAppLayout.vue";
</script>

<template>
    <Head title="Dashboard" />

    <DriftAppLayout>
<!--    <AuthenticatedLayout>-->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12_">
            <div class="mx-auto">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </DriftAppLayout>
<!--    </AuthenticatedLayout>-->
</template>
