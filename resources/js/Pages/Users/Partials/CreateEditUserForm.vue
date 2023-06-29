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
                    <h1 class="text-2xl text-grey-90">Create New User</h1>
                    <span class="text-xs"></span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5"></h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5">
                            <div class="mb-3">
                                <InputLabel for="price" value="First Name" />
                                <TextInput
                                    id="first_name"
                                    ref="first_name"
                                    v-model="userData.first_name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="first_name"
                                />
                            </div>
                            <div class="mb-3">
                                <InputLabel for="last_name" value="Last Name" />
                                <TextInput
                                    id="last_name"
                                    ref="last_name"
                                    v-model="userData.last_name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="last_name"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="email" value="Email" />
                                <TextInput
                                    id="email"
                                    ref="email"
                                    v-model="userData.email"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="email"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="phone" value="Phone" />
                                <TextInput
                                    id="phone"
                                    ref="phone"
                                    v-model="userData.phone"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="phone"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="country" value="Country" />
                                <TextInput
                                    id="country"
                                    ref="country"
                                    v-model="userData.country"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="country"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="city" value="City" />
                                <TextInput
                                    id="city"
                                    ref="city"
                                    v-model="userData.city"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="city"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="state" value="State" />
                                <TextInput
                                    id="state"
                                    ref="state"
                                    v-model="userData.state"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="state"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="zip" value="Zip" />
                                <TextInput
                                    id="zip"
                                    ref="zip"
                                    v-model="userData.zip"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="zip"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="address" value="Address" />
                                <TextInput
                                    id="address"
                                    ref="address"
                                    v-model="userData.address"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="address"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="address2" value="Address 2" />
                                <TextInput
                                    id="address2"
                                    ref="address2"
                                    v-model="userData.address2"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="address2"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="cnic" value="CNIC" />
                                <TextInput
                                    id="cnic"
                                    ref="cnic"
                                    v-model="userData.cnic"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autocomplete="cnic"
                                />
                            </div>
                            <div class="mb-4">
                                <InputLabel for="password" value="Password" />
                                <TextInput
                                    id="password"
                                    ref="password"
                                    v-model="userData.password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    autocomplete="password"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="role">
                                    User Role
                                </label>
                                <select id="role" v-model="userData.role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="role" data-selected="global">
                                    <option v-for="role in roles" :key="role.id" :value="role.id">
                                        {{ role.name.charAt(0).toUpperCase() + role.name.slice(1).replaceAll('-', ' ') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Information -->

        <!-- User Type -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h2 class="text-2xl text-grey-90">User Type</h2>
                    <span class="text-xs"></span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5"></h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5">
                            <div class="mb-3">
                                <label title="Rent On Property">User type is <u>ROP</u>?</label>
                                <div class="flex items-center space-x-6">
                                    <div>
                                        <label for="false_user_type">No</label>
                                        <input
                                            type="radio"
                                            name="user_type"
                                            id="false_user_type"
                                            class="mt-1 block"
                                            checked
                                            value="normal"
                                            v-model="userData.type"
                                        >
                                    </div>
                                    <div>
                                        <label for="true_user_type">Yes</label>
                                        <input
                                            type="radio"
                                            name="user_type"
                                            id="true_user_type"
                                            class="mt-1 block"
                                            value="rop"
                                            v-model="userData.type"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END User Type -->

        <!-- submit -->
        <div class="lg:flex gap-3 mb-3 mt-20 md:fixed md:bottom-1 md:right-8">
            <div class="w-full bg-white shadow-none sm:rounded-lg border rounded-lg p-4">
                <div class="mb-4">
                    <h2 class="text-2xl text-grey-90"></h2>
                </div>
                <div class="mb-2 mt-2">
                    <input type="submit" value="Save" class="flex items-center justify-center cursor-pointer bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-indigo-50 text-white font-semibold h-10 px-6 rounded-lg w-full sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400">
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

export default {
    name: "CreateEditUserForm",
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
    beforeDestroy () {},
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
    setup(props) {
        let alert = ref({
            title: '',
            show: false,
            intent: 'warning',
            messages: {}
        })
        const roles = props.roles;

        const userData = useForm({
            first_name: props?.user?.first_name || '',
            last_name: props?.user?.last_name || '',
            email: props?.user?.email || '',
            phone: props?.user?.phone || '',
            country: props?.user?.country || '',
            cnic: props?.user?.cnic || '',
            city: props?.user?.city || '',
            state: props?.user?.state || '',
            zip: props?.user?.zip || '',
            address: props?.user?.address || '',
            address2: props?.user?.address || '',
            type: props?.user?.type || '', // ROP or simple user
            password: props?.user?.password || '',
            role: props?.user?.role[0] || '',
        });

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
                    onProgress: (progress) => {},
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
            roles
        }
    }
}
</script>

<style scoped>

</style>
