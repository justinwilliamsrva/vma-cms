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
        ? 'block w-full underline underline-offset-4 decoration-1 decoration-solid text-center text-3xl sm:text-5xl font-raleway text-black transition duration-150 ease-in-out'
        : 'block w-full border-l-4 border-transparent text-center text-3xl sm:text-5xl font-raleway text-black transition duration-150 ease-in-out'
);
</script>

<style scoped>
 /* if screen mdaller than 585 text-3xl */

</style>

<template>
    <a v-if="!link" :href="href" :class="classes">
        <slot />
    </a>
    <Link v-else :href="href" :class="classes">
        <slot />
    </Link>
</template>
