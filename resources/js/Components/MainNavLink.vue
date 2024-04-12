<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    link: {
        type: Boolean
    }
})
</script>

<template>
    <a v-if="!link" :href="href" class="items-center pt-1 font-raleway text-[15px] font-normal leading-5 text-black transition duration-150 ease-in-out">
        <slot />
    </a>
    <Link v-else :href="href" :class="classes">
        <slot />
    </Link>
</template>