<script setup>
import { onMounted } from "vue";
import { useFilterStore } from "@/Stores/Filter";
import AppLayout from "@/Layouts/AppLayout.vue";
import SearchListings from "@/Components/Cars/SearchListings.vue";
import VehicleSelect from "@/Components/Cars/VehicleSelect.vue";
import LoadMore from "@/Components/Cars/LoadMore.vue";

const filterStore = useFilterStore();

const props = defineProps({
    makeProp: {
        type: String,
        default: "",
    },
    modelProp: {
        type: String,
        default: "",
    },
});

// Set store values to match props
// onMounted(() => {
//     filterStore.make = props.make;
//     filterStore.model = props.model;
// });
</script>

<template>
    <AppLayout title="Cars">
        <template #header>
            <VehicleSelect />
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                ></div>
            </div>
        </div>
    </AppLayout>
    <SearchListings />
    <LoadMore />
</template>
