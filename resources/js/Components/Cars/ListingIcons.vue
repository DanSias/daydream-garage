<script setup>
import SaveModal from "@/Components/Cars/SaveModal.vue";
import { useGarageStore } from "@/Stores/Garage";
const garageStore = useGarageStore();

const props = defineProps({
    car: {
        type: Object,
        default: {},
    },
});
</script>

<template>
    <div class="flex justify-around">
        <!-- Ignore -->
        <div class="has-tooltip">
            <span
                class="tooltip rounded shadow-lg p-1 bg-gray-900 text-gray-100 -ml-9 -mt-10 pl-2 pr-2"
                >Hide Listing</span
            >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6 text-red-700 cursor-pointer"
                @click="garageStore.ignoreCar(car, $page.props.auth.user)"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636"
                />
            </svg>
        </div>
        <!-- Save -->
        <div class="has-tooltip">
            <span
                class="tooltip rounded shadow-lg p-1 bg-gray-900 text-gray-100 -ml-9 -mt-10 pl-2 pr-2"
                >Save Listing</span
            >
            <SaveModal :car="car" />
        </div>
    </div>
</template>
