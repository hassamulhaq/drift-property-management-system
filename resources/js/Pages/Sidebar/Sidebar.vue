<template>
        <!-- Sidebar -->
        <aside class="border">
            <!-- Sidebar backdrop (mobile only) -->
            <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200 opacity-0 pointer-events-none" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true"></div>

            <!-- Sidebar -->
            <div id="sidebar" class="border-r border-r-2 border-r-gray-200 bg-white flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 py-4 px-3 transition-all duration-200 ease-in-out -translate-x-64">

                <!-- Sidebar header -->
                <div class="flex justify-between mb-0.5 pr-3 sm:px-2">
                    <!-- Close button -->
                    <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen" aria-expanded="false">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
                        </svg>
                    </button>
                </div>

                <!-- Links -->
                <div class="space-y-8">
                    <!-- Pages group -->
                    <div>
                        <ul class="mt-1">
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-200" @click="toggleMenu = !toggleMenu">
                                <a class="block text-slate-900 truncate transition duration-150" href="#0" @click.prevent="sidebarExpanded ? sidebarExpanded = !sidebarExpanded : sidebarExpanded = true">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                <path class="fill-current text-indigo-500" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path>
                                                <path class="fill-current text-indigo-600" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path>
                                                <path class="fill-current text-indigo-200" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"></path>
                                            </svg>
                                            <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                        </div>
                                        <!-- Icon -->
                                        <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 rotate-0" :class="sidebarExpanded ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    <ul class="pl-9 mt-1 hidden" :class="toggleMenu ? '!block' : 'hidden'">
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-indigo-500 transition duration-150 truncate" href="#">
                                                <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Main</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 bg-gray-200">
                                <Link :href="route('admin.products.index')">Product</Link>
                            </li>
                        </ul>
                    </div>
                    <!-- More group -->
                    <div>
                        <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                            <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                            <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">More</span>
                        </h3>
                        <ul class="mt-3">
                            <!-- Authentication -->
                            <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" @click="toggleMenu = !toggleMenu">
                                <a class="block text-slate-200 hover:text-white transition duration-150" :class="toggleMenu &amp;&amp; 'hover:text-slate-200'" href="#0" @click.prevent="sidebarExpanded ? sidebarExpanded = !sidebarExpanded : sidebarExpanded = true">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                                <path class="fill-current text-slate-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
                                                <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z"></path>
                                            </svg>
                                            <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Authentication</span>
                                        </div>
                                        <!-- Icon -->
                                        <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 rotate-0" :class="toggleMenu ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                                <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                    <ul class="pl-9 mt-1 hidden" :class="toggleMenu ? '!block' : 'hidden'">
                                        <li class="mb-1 last:mb-0">
                                            <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="#">
                                                <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign In</span>
                                            </a>
                                        </li>
                                        <li class="mb-1 last:mb-0">
                                            <!-- Authentication -->
                                            <form method="POST" @submit.prevent="logout">
                                                <button type="submit" class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate">
                                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Log Out</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Onboard -->

                            <!-- Components -->

                        </ul>
                    </div>
                </div>

                <!-- Expand / collapse button -->
                <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
                    <div class="px-3 py-2">
                        <button @click="sidebarExpanded = !sidebarExpanded">
                            <span class="sr-only">Expand / collapse sidebar</span>
                            <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                                <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"></path>
                                <path class="text-slate-600" d="M3 23H1V1h2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </aside>

</template>

<script>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Head, Link, router } from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import {ref} from "vue";
export default {
    name: "Sidebar",
    components: {ResponsiveNavLink, NavLink, ApplicationLogo, Link},
    props: {

    },
    setup(props) {
        const sidebarExpanded = ref(false)
        const sidebarOpen = ref(false)
        const toggleMenu = ref(false)

        const logout = () => {
            router.post(route('logout'));
        }

        return {
            sidebarOpen,
            toggleMenu,
            sidebarExpanded,
            logout
        }
    }
}
</script>

<style scoped>

</style>
