<script setup>
import { computed } from 'vue';

const props = defineProps({
    active: {
        type: Boolean
    },
    direction: {
        type: String,
        default: 'right'
    },
    class: {
        type: String,
    }
});

const classes = computed(() =>
    props.class + ' ' +
    (props.active
        ? 'block w-full border-l-4 border-indigo-400 text-center text-3xl sm:text-5xl font-raleway font-normal text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'block w-full border-l-4 border-transparent text-center text-3xl sm:text-5xl font-raleway font-normal text-black focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out')
);
</script>

<template>
    <div :class="classes" class="flex items-center justify-center">
        <svg v-if="direction == 'left'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.75" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
        <slot />
        <svg v-if="direction == 'right'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.75" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    </div>
</template>
