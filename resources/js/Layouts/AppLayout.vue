<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import NavDropdown from '@/Components/NavDropdown.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import SpecialButton from '@/Components/SpecialButton.vue';
import { Link, Head } from '@inertiajs/vue3';
import imageUrl from '@assets/images/header/VMA+Black+Logo.png';

const aboutUsRoutes = [
    {'text':'Mission', 'url':route('about')},
    {'text':'Curriculum', 'url':route('curriculum')},
    {'text':'Educators', 'url':route('educators')},
    {'text':'Location', 'url':route('location')},
    {'text':'Calendar', 'url':route('calendar')},
];

const showingNavigationDropdown = ref(false);
</script>

<template>
    <Head title="Home" />

    <div>
        <div class="min-h-screen bg-background-primary">
            <nav class="px-16 py-8">
                <!-- Primary Navigation Menu -->
                <div class="mx-6">
                    <div class="flex w-full">
                        <!-- Navigation Links -->
                        <div class="hidden space-x-4 sm:flex items-center flex-1">
                            <NavLink :href="route('home')">
                                Home
                            </NavLink>
                            <NavDropdown >
                                <template #trigger>
                                    About Us
                                </template>
                                <Link v-for="r in aboutUsRoutes" :key="r.text" :href="r.url" class="items-center pt-1 font-raleway text-[15px] font-normal leading-5 text-black transition duration-150 ease-in-out">
                                    {{ r.text }}
                                </Link>
                            </NavDropdown>
                            <NavLink :href="route('program')">
                                Program
                            </NavLink>
                            <NavLink :href="route('admission')">
                                Admission
                            </NavLink>
                            <NavLink :href="route('portal')" :active="route().current('portal')">
                                Portal
                            </NavLink>
                        </div>

                        <!-- Logo -->
                        <div class="shrink-0 flex items-center justify-center flex-1">
                            <Link :href="route('dashboard')">
                               <img :src="imageUrl" class="w-42">
                            </Link>
                        </div>

                        <div class="flex-1 flex items-center justify-end">
                            <SpecialButton :href="route('landing-page')" class="px-9 py-5 text-sm">
                                Inquire Here!
                            </SpecialButton>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                Justin
                            </div>
                            <div class="font-medium text-sm text-gray-500">Email</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
