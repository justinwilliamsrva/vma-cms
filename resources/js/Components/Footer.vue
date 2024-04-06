<script setup>
import imageUrl from '@assets/images/Member_School_PNG.png';

</script>

<template>
    <div class="px-[4%] py-[3%] flex flex-col md:flex-row space-x-4 font-raleway">
        <div class="md:w-8/12 h-64">
            <h3 class="text-village-green text-2xl mb-8">
                Village Montessori Academy
            </h3>
            <p class="text-sm mb-4">
                923 Buford Rd <br/> Richmond, VA 23235
            </p>
            <p class="text-sm">
                (804) 510-6400 | office@villagemont.org
            </p>
        </div>
        <div class="md:w-4/12 flex flex-col align-end">
            <p class="text-right text-sm mb-10">
                Stay in the Loop <br/> —
            </p>
            <div class="flex justify-end space-x-4 mb-8">
                <i class="fa-brands fa-instagram text-xl"></i>
                <i class="fa-brands fa-facebook-f text-xl"></i>
            </div>
            <div class="flex justify-end">
                <img :src="imageUrl" class=""/>
            </div>
        </div>
    </div>
</template>