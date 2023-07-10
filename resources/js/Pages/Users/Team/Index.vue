<template>
    <DriftAppLayout title="All Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Team Hierarchy
            </h2>
        </template>

        <div class="relative overflow-x-auto sm:rounded-lg px-2 p-4 sm:p-8 bg-white shadow">
            <div class="flex items-center justify-between py-4 bg-white dark:bg-gray-800">
                <div>

                </div>
                <div class="flex items-center space-x-2">
                    <div>
                        <Link :href="route('admin.users.teams.create')" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Create Team
                        </Link>
                    </div>
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
                                   placeholder="Search for users">
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
import {reactive, ref} from "vue";
import {AgGridVue} from "ag-grid-vue3";
import "ag-grid-community/styles/ag-grid.css"; // Core grid CSS, always needed
import "ag-grid-community/styles/ag-theme-alpine.css";
import { Link } from '@inertiajs/vue3';
import TeamDeleteButton from "@/Components/Users/TeamDeleteButton.vue";

export default {
    name: "Index",
    components: {
        DriftAppLayout,
        AgGridVue,
        Link
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
                {headerName: "ID", field: "id", width: 80},
                {headerName: "Parent", field: "parent", width: 340},
                {headerName: "Child", field: "child", width: 340},
                {headerName: "Created At", field: "created_at", width: 160},
                {
                    headerName: "Action",
                    field: "delete_team",
                    cellRenderer: TeamDeleteButton,
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
            wrapHeaderText: true,
            autoHeaderHeight: true,
        };
        rowData.value = props?.users?.map((user) => {
            console.log(user)
            const parent = `${
                user.first_name +
                ' ' + ((user.last_name !== null) ? user.last_name : '') +
                '- (' + user.roles[0]?.name + ') '
            }`;
            const child = `${
                (user?.lower_level_roles.length > 0) ? user?.lower_level_roles[0]?.first_name +'- ('+ user?.lower_level_roles[0]?.email+')' : '-'
            }`;
            return {
                'id': user.id,
                'email': user.email,
                'parent': parent,
                'child': child,
                'type': user.type ?? '-',
                'created_at': new Date(user.created_at).toDateString(),
                'delete_team': user.id
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
