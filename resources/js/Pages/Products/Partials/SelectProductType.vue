<template>

    <span>
        <span @click="handleModalPopup">
            <slot/>
        </span>

        <DialogModal :show="modalValue" @close="closeModal">
            <template #title>
                {{ title }}
            </template>
            <template #content>
                {{ content }}
                <Dropdown width="" class="w-max">
                    <template #trigger>
                        <span class="inline-flex rounded-md border">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                Choose Product Type
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                            </button>
                        </span>
                    </template>
                    <template #content>
                        <div class="w-full">
                            <DropdownLink :href="route('admin.products.property.create')">
                                Property
                            </DropdownLink>
                        </div>
                    </template>
                </Dropdown>
            </template>
            <template #footer>
                <SecondaryButton @click="closeModal">
                    Cancel
                </SecondaryButton>

                <PrimaryButton
                    v-if="confirmButton"
                    class="ml-3"
                    @click="handleProductType"
                >
                    {{ button }}
                </PrimaryButton>
            </template>
        </DialogModal>
    </span>
</template>

<script>
import DialogModal from "@/Components/DialogModal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import DropdownFull from "@/Components/DropdownFull.vue";
export default {
    name: "SelectProductType",
    components: {DropdownFull, DropdownLink, Dropdown, PrimaryButton, SecondaryButton, DialogModal},
    props: {
        title: {
            type: String,
            default: 'Choose Product Type',
        },
        content: {
            type: String,
            default: '',
        },
        button: {
            type: String,
            default: 'Confirm',
        },
    },
    setup(props) {
        const modalValue = ref(false);
        const confirmButton = ref(false);

        const closeModal = () => {
            modalValue.value = false
        };


        const handleProductType = () => {
            console.log('devHassam')
        };

        const handleModalPopup = () => {
            modalValue.value = !modalValue.value;
        };

        return {
            closeModal,
            modalValue,
            handleProductType,
            handleModalPopup,
            confirmButton
        }
    }
}
</script>

<style scoped>

</style>
