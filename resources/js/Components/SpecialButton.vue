<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    href: {
        type: String,
        required: true,
    }
})
</script>
<template>
    <Link :href="href" class="bg-background-special text-white hover:opacity-50">
        <slot />
    </Link>
</template>