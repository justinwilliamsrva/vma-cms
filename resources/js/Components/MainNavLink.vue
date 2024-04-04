<script setup>
const props = defineProps({
    href: {
        type: String,
        required: true,
    },
})
</script>

<template>
    <a :href="href" class="items-center pt-1 font-raleway text-[15px] font-normal leading-5 text-black transition duration-150 ease-in-out">
        <slot />
    </a>
</template>