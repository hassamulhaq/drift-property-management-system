<template>
    <Alert
        :intent="alert.intent"
        :show="alert.show"
        :title="alert.title"
        :on-dismiss="() => alert.show = false"
    >
        <div v-if="typeof alert.messages === 'string'">
            <p>{{ alert.messages }}</p>
        </div>
        <div v-else>
            <p v-for="message in alert.messages">{{ message }}</p>
        </div>
    </Alert>

    <form @submit.prevent="storeUser">
        <!-- Information -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Create Team</h1>
                    <span class="text-xs"></span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5"></h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5">
                            <div class="mb-3">
                                <label for="role">
                                    Upper Level Users
                                </label>
                                <select id="role" v-model="userData.upper_level_ids" @change="updateLowerRoles($event)"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="role" data-selected="global">
                                    <option v-for="user in users" :key="user.id" :value="user.id">
                                        {{ user.name }} - {{ user.email }}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="role">
                                    Lower Level Users
                                </label>
                                <select id="role" v-model="userData.role"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="role" data-selected="global">
                                    <option v-for="role in roles" :key="role.id" :value="role.id">
                                        {{
                                            role.name.charAt(0).toUpperCase() + role.name.slice(1).replaceAll('-', ' ')
                                        }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Information -->

        <!-- submit -->
        <div class="lg:flex gap-3 mb-3 mt-20 md:fixed md:bottom-1 md:right-8">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-4">
                    <h2 class="text-2xl text-grey-90"></h2>
                </div>
                <div class="mb-2 mt-2">
                    <input type="submit" value="Save"
                           class="flex items-center justify-center cursor-pointer bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-indigo-50 text-white font-semibold h-10 px-6 rounded-lg w-full sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400">
                </div>
            </div>
        </div>
        <!-- submit -->
    </form>
</template>

<script>
import TextInput from "@/Components/TextInput.vue";
import FormSection from "@/Components/FormSection.vue";

import {ref} from "vue";
import ActionMessage from "@/Components/ActionMessage.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import {useForm} from "@inertiajs/vue3";
import TextareaInput from "@/Components/TextareaInput.vue";
import Alert from "@/Components/Alert.vue";
import {Dashboard} from '@uppy/vue'
import axios from "axios";

export default {
    name: "CreateEditTeamForm",
    components: {
        Alert,
        TextareaInput,
        InputError,
        InputLabel,
        PrimaryButton,
        ActionMessage,
        FormSection,
        TextInput,
        Dashboard
    },
    computed: {},
    beforeDestroy() {
    },
    props: {
        users: {
            type: Object,
            required: true
        }
    },
    setup(props) {
        let alert = ref({
            title: '',
            show: false,
            intent: 'warning',
            messages: {}
        })
        const roles = props.roles;

        const userData = useForm({
            upper_level_ids: props?.user?.upper_level_ids || '',
            lower_level_ids: props?.user?.lower_level_ids || ''
        });

        const info = null;
        const loading = true;
        const errored = false;

        function updateLowerRoles(event) {
            axios.defaults.headers.common = {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };
            axios.post(route('admin.users.lower-level-users'), {
                "userId": event.target.value
            })
                .then(response => {
                    console.log('response.data', response.data)
                    this.info = response.data
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() => this.loading = false)
        }

        const storeUser = () => {
            if (props?.user?.id > 0) {
                userData.put(route('admin.users.update', props?.user?.id), {
                    errorBag: 'storeUser',
                    preserveScroll: true,
                    onSuccess: (page) => {
                        if (page.props?.flash?.response?.success === false) {
                        }
                    },
                    onError: (errors) => {
                        alert.value.show = true
                        alert.value.title = 'Something went wrong!'
                        alert.value.intent = 'danger'
                        alert.value.messages = errors
                    }
                });
            } else {
                userData.post(route('admin.users.store'), {
                    errorBag: 'storeUser',
                    preserveScroll: true,
                    onProgress: (progress) => {
                    },
                    onSuccess: (page) => {
                        console.log(page.props?.flash)
                        if (page.props?.flash?.response?.success === true) {
                            alert.value.show = true
                            alert.value.title = 'Response'
                            alert.value.intent = 'success'
                            alert.value.messages = page.props?.flash?.response?.message
                        }
                    },
                    onError: (errors) => {
                        alert.value.show = true
                        alert.value.title = 'Something went wrong!'
                        alert.value.intent = 'danger'
                        alert.value.messages = errors
                    },
                    onCancel: () => {
                        console.log('onCancel')
                    },
                    onFinish: visit => {
                        console.log('onFinish', visit)
                    },
                });
            }
        }

        return {
            storeUser,
            userData,
            alert,
            roles,
            updateLowerRoles
        }
    }
}
</script>

<style scoped>

</style>
