<template>
    <DriftAppLayout title="Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>

        <div class="relative overflow-x-auto sm:rounded-lg px-2 p-4 sm:p-8 bg-white shadow">
            <div class="flex items-center justify-between py-4 bg-white dark:bg-gray-800">
                <div>
                    <Dropdown width="60">
                        <template #trigger>
                            <span class="inline-flex rounded-md border">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                    Action
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </span>
                        </template>
                        <template #content>
                            <div class="w-full">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Action...
                                </div>
                            </div>
                        </template>
                    </Dropdown>
                </div>
                <div class="flex items-center space-x-2">
                    <SelectProductType>
                        <SecondaryButton data-modal-target="create-product-modal" data-modal-toggle="create-product-modal">
                            Create Product
                        </SecondaryButton>
                    </SelectProductType>
                    <div>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for products">
                        </div>
                    </div>
                </div>
            </div>

<!--            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">-->
<!--                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">-->
<!--                <tr>-->
<!--                    <th scope="col" class="p-4">-->
<!--                        <div class="flex items-center">-->
<!--                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
<!--                            <label for="checkbox-all-search" class="sr-only">checkbox</label>-->
<!--                        </div>-->
<!--                    </th>-->
<!--                    <th scope="col" class="px-6 py-3">-->
<!--                        Title-->
<!--                    </th>-->
<!--                    <th scope="col" class="px-6 py-3">-->
<!--                        SKU-->
<!--                    </th>-->
<!--                    <th scope="col" class="px-6 py-3">-->
<!--                        Product Type-->
<!--                    </th>-->
<!--                    <th scope="col" class="px-6 py-3">-->
<!--                        Price-->
<!--                    </th>-->
<!--                    <th scope="col" class="px-6 py-3">-->
<!--                        Status-->
<!--                    </th>-->
<!--                    <th scope="col" class="px-6 py-3">-->
<!--                        Action-->
<!--                    </th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr-->
<!--                    v-for="product in products.data" :key="product.id"-->
<!--                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"-->
<!--                >-->
<!--                    <td class="w-4 p-4">-->
<!--                        <div class="flex items-center">-->
<!--                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
<!--                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">-->
<!--                        <img class="w-10 h-10 rounded-full" src="" alt="🦕">-->
<!--                        <div class="pl-3">-->
<!--                            <div class="text-base font-semibold">{{ product.product_property.title }}</div>-->
<!--                        </div>-->
<!--                    </th>-->
<!--                    <td class="px-6 py-4">-->
<!--                        {{ product.product_property.sku }}-->
<!--                    </td>-->
<!--                    <td class="px-6 py-4">-->
<!--                        {{ product.product_type }}-->
<!--                    </td>-->
<!--                    <td class="px-6 py-4">-->
<!--                        {{ product.product_property.price }}-->
<!--                    </td>-->
<!--                    <td class="px-6 py-4">-->
<!--                        <div class="flex items-center">-->
<!--                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> {{ product.product_property.status }}-->
<!--                        </div>-->
<!--                    </td>-->
<!--                    <td class="px-6 py-4">-->
<!--                        &lt;!&ndash; Modal toggle &ndash;&gt;-->
<!--                        <a href="#" type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">-->
<!--                            Edit-->
<!--                        </a>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->

            <button @click="deselectRows">Deselect Rows</button>
            <ag-grid-vue
                style="width: 100%; height: 500px;"
                class="ag-theme-alpine"
                :columnDefs="columnDefs.value"
                :rowData="rowData.value"
                :defaultColDef="defaultColDef"
                rowSelection="multiple"
                animateRows="true"
                @cell-clicked="cellWasClicked"
                @grid-ready="onGridReady"
            >
            </ag-grid-vue>

        </div>


    </DriftAppLayout>
</template>

<script>
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import SelectProductType from "@/Pages/Products/Partials/SelectProductType.vue";
import { AgGridVue } from "ag-grid-vue3";  // the AG Grid Vue Component
import { reactive, onMounted, ref } from "vue";

import "ag-grid-community/styles/ag-grid.css"; // Core grid CSS, always needed
import "ag-grid-community/styles/ag-theme-alpine.css";
import DriftAppLayout from "@/Layouts/DriftAppLayout.vue"; // Optional theme CSS

export default {
    name: "Show",
    components: {
        DriftAppLayout,
        SelectProductType,
        SecondaryButton,
        PrimaryButton,
        DropdownLink,
        Dropdown,
        AgGridVue
    },
    props: {
        products: {
            type: Object,
            required: true
        },
    },
    setup(props) {
        const gridApi = ref(null);
        // Obtain API from grid's onGridReady event
        const onGridReady = (params) => {
            gridApi.value = params.api;
        };
        const rowData = reactive({}); // Set rowData to Array of Objects, one Object per Row
        // Each Column Definition results in one Column.
        const columnDefs = reactive({
            value: [
                { headerName: "Title", field: "title", width: 220},
                // { headerName: "Slug", field: "slug"},
                { headerName: "SKU", field: "sku", width: 164, pinned: 'left'},
                // { headerName: "Short Description", field: "short_description"},
                // { headerName: "Tags", field: "tags"},
                { headerName: "Product Number", field: "product_number"},
                { headerName: "Price Prefix", field: "price_prefix"},
                { headerName: "Price", field: "price"},
                { headerName: "Second Price", field: "second_price"},
                // { headerName: "Price Postfix", field: "price_postfix"},
                // { headerName: "Size", field: "size"},
                // { headerName: "Size Prefix", field: "size_prefix"},
                // { headerName: "Land", field: "land"},
                // { headerName: "Land Postfix", field: "land_postfix"},
                // { headerName: "Bedrooms", field: "bedrooms"},
                // { headerName: "Garage", field: "garage"},
                // { headerName: "Garage Size", field: "garage_size"},
                { headerName: "Year", field: "year"},
                { headerName: "Property Id", field: "property_id"},
                // { headerName: "Map", field: "map"},
                // { headerName: "Map Address", field: "map_address"},
                // { headerName: "Address", field: "address"},
                { headerName: "Zip", field: "zip"},
                { headerName: "Featured", field: "featured"},
                // { headerName: "Logged_in_to_view", field: "logged_in_to_view"},
                // { headerName: "Disclaimer", field: "disclaimer"},
                // { headerName: "Virtual_tour", field: "virtual_tour"},
                // { headerName: "Agent_display_option", field: "agent_display_option"},
                // { headerName: "Attachments", field: "attachments"},
                // { headerName: "Private_note", field: "private_note"},
                // { headerName: "Energy_class", field: "energy_class"},
                // { headerName: "Energy_global_index", field: "energy_global_index"},
                // { headerName: "Renewable_energy_global_index", field: "renewable_energy_global_index"},
                // { headerName: "Energy_performance", field: "energy_performance"},
                // { headerName: "Epc_current_rating", field: "epc_current_rating"},
                // { headerName: "Epc_potential_rating", field: "epc_potential_rating"},
                { headerName: "Status", field: "status"},
                { headerName: "Property Type", field: "property_type_id"},
                { headerName: "Property Status", field: "property_status_id"},
                // { headerName: "Features", field: "features"},
                // { headerName: "Property_label_id", field: "property_label_id"},
                // { headerName: "Country_id", field: "country_id"},
                { headerName: "State", field: "state_id"},
                { headerName: "City", field: "city_id"},
                { headerName: "Area", field: "area_id"},
                { headerName: "Parent", field: "parent_id"},
                { headerName: "Published at", field: "published_at"},
                // { headerName: "Metadata", field: "meta_data"}
            ],
        });
        // DefaultColDef sets props common to all Columns
        const defaultColDef = {
            sortable: true,
            filter: true,
            flex: 0,
            resizable: true,
            enableRowGroup: true,
            enablePivot: true,
            enableValue: true,
            initialWidth: 140,
            wrapHeaderText: true,
            autoHeaderHeight: true,
        };
        rowData.value = props?.products?.map((property) => {
            return property?.product_property
        });

        return {
            onGridReady,
            columnDefs,
            rowData,
            defaultColDef,
            cellWasClicked: (event) => { // Example of consuming Grid Event
                console.log("cell was clicked", event);
            },
            deselectRows: () =>{
                gridApi.value.deselectAll()
            }
        };
    }

}
</script>

<style scoped>

</style>
