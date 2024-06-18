<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Acura from "@/Components/Logos/Acura.vue";
import BMW from "@/Components/Logos/BMW.vue";
import Nissan from "@/Components/Logos/Nissan.vue";
import CarBrandIcon from "@/Components/CarBrandIcon.vue";
</script>

<template>
    <AppLayout title="Cars">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Daydream Garage
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <CarBrandIcon
                        :brand="'Acura'"
                        class="fill-white w-full h-64"
                    />
                    <CarBrandIcon
                        :brand="'BMW'"
                        class="fill-white w-full h-64"
                    />
                    <Nissan class="fill-white w-full h-64" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
