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
    dropdown: {
        type: Boolean,
        default: false,
    },
});


const classes = computed(() =>
    (props.dropdown ? '' : 'inline-flex px-1')+
    (props.active
        ? 'items-center pt-1 underline underline-offset-4 decoration-1 decoration-solid font-raleway text-[15px] font-normal leading-5 text-black transition duration-150 ease-in-out'
        : 'items-center pt-1 font-raleway text-[15px] font-normal leading-5 text-black transition duration-150 ease-in-out')
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
