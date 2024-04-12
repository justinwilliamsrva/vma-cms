<script setup>
    import {inject, ref} from 'vue';
    let showingNavigationDropdown = inject('showingNavigationDropdown');

    function toggleMenu() {
        showingNavigationDropdown.value = !showingNavigationDropdown.value;
    }
</script>
<template>
    <div class="w-12 flex lg:hidden items-center">
        <div @click="toggleMenu" class="flex-1 px-2 h-3 flex flex-col justify-between items-center cursor-pointer">
            <!-- Hamburger line 1 -->
            <div
                :class="[
                    'w-full h-[1px] bg-black transition-transform duration-300 ease-in-out',
                    showingNavigationDropdown ? 'rotate-[135deg] translate-y-1.5' : ''
                ]"
            ></div>
            <!-- Hamburger line 2 -->
            <div
                :class="[
                    'w-full h-[1px] bg-black transform transition duration-300 ease-in-out',
                    showingNavigationDropdown ? '-rotate-[135deg] -translate-y-1.5' : ''
                ]"
            ></div>
        </div>
    </div>
</template>