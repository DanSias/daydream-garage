<script setup>
import { ref, watch } from "vue";
import { useElementVisibility } from "@vueuse/core";
import { useGarageStore } from "@/Stores/Garage";
const garageStore = useGarageStore();

const target = ref(null);
const targetIsVisible = useElementVisibility(target);
watch(
    () => targetIsVisible,
    (selection, prevSelection) => {
        if (targetIsVisible && garageStore.results.length) {
            // alert("ready for more");
        }
        // garageStore.getSearchResults();
    }
);
</script>
<template>
    <div
        v-if="garageStore.results.length"
        class="flex justify-center cursor-pointer mt-4"
        @click="garageStore.loadMore(garageStore.results.length)"
    >
        <div>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6 text-gray-50 mt-4 mr-2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3"
                />
            </svg>
        </div>
        <div>
            <h5 ref="target" class="text-xl text-gray-50 my-4">Load More</h5>
        </div>
        <div>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6 text-gray-50 mt-4 ml-2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3"
                />
            </svg>
        </div>
    </div>
</template>
