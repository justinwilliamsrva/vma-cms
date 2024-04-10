<script setup>
import { provide, ref, watch, computed, onMounted, onUnmounted} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import NavDropdown from '@/Components/NavDropdown.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import SpecialButton from '@/Components/SpecialButton.vue';
import MainNavLink from '@/Components/MainNavLink.vue';
import Hamburger from '@/Components/Hamburger.vue';
import Footer from '@/Components/Footer.vue';
import { Link, Head } from '@inertiajs/vue3';
import imageUrl from '@assets/images/VMA+Black+Logo.png';

const aboutUsRoutes = [
    {'text':'Mission', 'url':'https://www.villagemont.org/about'},
    {'text':'Curriculum', 'url':'https://www.villagemont.org/curriculum'},
    {'text':'Educators', 'url':'https://www.villagemont.org/educators'},
    {'text':'Location', 'url':'https://www.villagemont.org/location'},
    {'text':'Calendar', 'url':'https://www.villagemont.org/calendar'},
];

const navHeight = ref(0);

const calculateNavHeight = () => {
    const navElement = document.querySelector('nav');
    const navStyles = window.getComputedStyle(navElement);
    const firstDiv = document.querySelector('nav > div:first-child');

    navHeight.value = firstDiv.offsetHeight + parseInt(navStyles.paddingTop) + parseInt(navStyles.paddingBottom);
};

const topValue = computed(() => `${navHeight.value}px`);

onMounted(() => {
    calculateNavHeight();
    window.addEventListener('resize', calculateNavHeight);
});

onUnmounted(() => {
    window.removeEventListener('resize', calculateNavHeight);
});

const showingNavigationDropdown = ref(false);

watch(showingNavigationDropdown, (value) => {
    if (value) {
        document.body.classList.add('overflow-hidden');
    } else {
        document.body.classList.remove('overflow-hidden');
    }
});

provide('showingNavigationDropdown', showingNavigationDropdown);

</script>

<template>
    <Head title="Home" />

    <div>
        <div class="min-h-screen bg-background-primary flex flex-col">
            <nav class="p-[6%] lg:px-[4%] lg:py-[2%]">
                <!-- Primary Navigation Menu -->
                <div class="flex mx-auto max-w-7xl">
                    <!-- Navigation Links -->
                    <div class="hidden lg:flex space-x-4 items-center flex-1">
                        <MainNavLink :href="'https://www.villagemont.org/'">
                            Home
                        </MainNavLink>
                        <NavDropdown>
                            <template #trigger>
                                About Us
                            </template>
                            <MainNavLink v-for="route in aboutUsRoutes" :key="route.text" :href="route.url">
                                {{ route.text }}
                            </MainNavLink>
                        </NavDropdown>
                        <MainNavLink :href="'https://www.villagemont.org/programs'">
                            Program
                        </MainNavLink>
                        <MainNavLink :href="'https://www.villagemont.org/admission'">
                            Admission
                        </MainNavLink>
                        <NavLink :href="route('portal')" :active="route().current('portal')">
                            Portal
                        </NavLink>
                    </div>

                    <!-- Logo -->
                    <div class="pl-12 lg:pl-0 flex-grow lg:grow-0 flex items-center justify-center">
                        <a href="https://www.villagemont.org">
                            <img :src="imageUrl" class="w-24 lg:w-42">
                        </a>
                    </div>

                    <!-- Call To Action -->
                    <div class="flex-1 hidden lg:flex items-center justify-end">
                        <SpecialButton :href="route('landing-page')" class="px-9 py-5 text-sm">
                            Inquire Here!
                        </SpecialButton>
                    </div>

                    <!-- Hamburger -->
                    <Hamburger />
                </div>
            </nav>
                <!-- Responsive Nave -->
                <div
                    :class="{block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="fixed inset-0 bg-background-primary z-10 lg:hidden" :style="{top: topValue}"
                >
                    <div class="flex flex-col justify-center space-y-1 h-[80%]">
                        <ResponsiveNavLink :href="'https://www.villagemont.org/'">
                            Home
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="'https://www.villagemont.org/'">
                            About Us
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="'https://www.villagemont.org/programs'">
                            Program
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="'https://www.villagemont.org/admission'">
                            Admission
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('portal')">
                            Portal
                        </ResponsiveNavLink>
                    </div>
                    <div class="flex justify-center">
                        <SpecialButton :href="route('landing-page')" class="px-9 py-5 text-sm">
                            Inquire Here!
                        </SpecialButton>
                    </div>
                </div>

            <!-- Page Heading -->
            <!-- <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header> -->

            <!-- Page Content -->
            <main class="flex-grow bg-background-secondary">
                <slot />
            </main>

            <!-- Footer -->
            <Footer />
        </div>
    </div>
</template>
