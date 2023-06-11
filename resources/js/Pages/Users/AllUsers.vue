<template>
    <DriftAppLayout title="All Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Users
            </h2>
        </template>

        <div class="relative overflow-x-auto sm:rounded-lg px-2 p-4 sm:p-8 bg-white shadow">
            <div class="flex items-center justify-between py-4 bg-white dark:bg-gray-800">
                <div>

                </div>
                <div class="flex items-center space-x-2">

                    <div>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search-users"
                                   class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Search for products">
                        </div>
                    </div>
                </div>
            </div>
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
import DriftAppLayout from "@/Layouts/DriftAppLayout.vue";
import {reactive, onMounted, ref} from "vue";
import {AgGridVue} from "ag-grid-vue3";
import "ag-grid-community/styles/ag-grid.css"; // Core grid CSS, always needed
import "ag-grid-community/styles/ag-theme-alpine.css";
import UserEditButton from "@/Components/Users/UserEditButton.vue";
import {USER_ROLE_LABEL} from "@/Constants/User";

export default {
    name: "AllUsers",
    components: {
        DriftAppLayout,
        AgGridVue
    },
    props: {
        users: {
            type: Object,
            required: true
        },
    },
    setup(props) {
        const gridApi = ref(null);
        const onGridReady = (params) => {
            gridApi.value = params.api;
        };
        const rowData = reactive({}); // Set rowData to Array of Objects, one Object per Row
        const columnDefs = reactive({
            value: [
                {headerName: "Profile Image", field: "profile"},
                {headerName: "Fullname", field: "fullname"},
                {headerName: "Email", field: "email", width: 220},
                {headerName: "Phone", field: "phone"},
                {headerName: "Address", field: "address", width: 200},
                {headerName: "Type (ROP/Sale)", field: "type"},
                {headerName: "Role", field: "role", width: 180},
                {headerName: "Created At", field: "created_at"},
                {
                    headerName: "Action",
                    field: "edit_user",
                    cellRenderer: UserEditButton,
                    cellRendererParams: {
                        clicked: function (field) {
                            alert(`${field} was clicked`);
                        }
                    },
                }
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
        rowData.value = props?.users?.map((user) => {
            return {
                'sku': user.sku,
                'fullname': user.first_name + user.last_name,
                'email': user.email,
                'phone': user.phone,
                'country': user.country,
                'address': user.address,
                'type': user.type ?? '-',
                'role': user?.roles[0]?.name || '-',
                'created_at': new Date(user.created_at).toDateString(),
                'edit_user': user.id
            }
        });

        return {
            onGridReady,
            columnDefs,
            rowData,
            defaultColDef,
            cellWasClicked: (event) => { // Example of consuming Grid Event
                console.log("cell was clicked", event);
            },
            deselectRows: () => {
                gridApi.value.deselectAll()
            }
        };
    }
}
</script>

<style scoped>

</style>
