<script setup>
    const props = defineProps({
        class: {
            type: String
        }
    });
</script>

<template>
    <button
        :class="props.class"
        class="inline-flex items-center bg-background-special text-white hover:opacity-50 ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
