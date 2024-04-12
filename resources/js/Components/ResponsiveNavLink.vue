<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
    link: {
        type: Boolean,
    }
});

const classes = computed(() =>
    props.active
        ? 'block w-full border-l-4 border-indigo-400 text-center text-3xl sm:text-5xl font-raleway font-normal text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'block w-full border-l-4 border-transparent text-center text-3xl sm:text-5xl font-raleway font-normal text-black focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<style scoped>
 /* if screen smaller than 585 text-3xl */

</style>

<template>
    <a v-if="!link" :href="href" :class="classes">
        <slot />
    </a>
    <Link v-else :href="href" :class="classes">
        <slot />
    </Link>
</template>
