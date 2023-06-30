<template>
    <button type="button"
            class="inline-flex items-center px-4 py-1 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-xs hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:ring-offset-1 disabled:opacity-25 transition ease-in-out duration-150"
            @click="btnClickedHandler()">
        Delete Team
    </button>
</template>

<script>
export default {
    name: "TeamDeleteButton",
    methods: {
        btnClickedHandler() {
            this.params.clicked(this.params.value);
        }
    }
}
</script>

<style scoped>

</style>
