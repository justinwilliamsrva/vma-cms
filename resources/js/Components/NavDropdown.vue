<script setup>
import {ref} from 'vue';

const showingNavigationDropdown = ref(false);

const showDropdown = () => {
    showingNavigationDropdown.value = true;
}

const hideDropdown = () => {
    showingNavigationDropdown.value = false;
}
</script>
<template>
    <div @mouseover="showDropdown" @mouseleave="hideDropdown" class="items-center px-1 pt-1 font-raleway text-[15px] font-normal leading-5 text-black transition duration-150 ease-in-out cursor-pointer">
        <slot name="trigger" />
        <div class="absolute flex flex-col z-10 pt-2" :class="{'hidden': !showingNavigationDropdown}">
            <slot />
        </div>
    </div>
</template>