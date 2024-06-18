<script setup>
import { watch, ref, onMounted } from "vue";
import ListingIcons from "./ListingIcons.vue";

import { useFilterStore } from "@/Stores/Filter";
const filterStore = useFilterStore();

import { useGarageStore } from "@/Stores/Garage";
const garageStore = useGarageStore();

// onMounted(() => {
//     garageStore.getSearchResults();
// });

watch(
    () => filterStore.model,
    (selection, prevSelection) => {
        garageStore.getSearchResults();
    }
);
const numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};
</script>

<template>
    <div class="bg-gray-900">
        <div
            class="grid gap-5 mx-8 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-5"
        >
            <div
                v-for="(car, i) in garageStore.results"
                :key="i"
                class="listing-card w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
            >
                <div class="flex flex-col">
                    <!-- Image as link to FB listing -->
                    <div class="has-tooltip">
                        <!-- <span
                            class="tooltip rounded shadow-lg p-1 bg-gray-900 text-gray-100 -mt-10 pl-2 pr-2"
                            >Open on {{ car.source }}</span
                        > -->
                        <a :href="car.url" target="_blank">
                            <img
                                class="w-full rounded-t-lg"
                                :src="car.image"
                                :alt="'Open on ' + car.source"
                            />
                        </a>
                    </div>
                    <!-- Age and Mileage Overlay -->
                    <div class="rounded bg-gray-700 mx-2 -mt-10">
                        <div class="flex justify-between">
                            <div class="years-old">
                                <p class="text-gray-50 ml-2 my-1">
                                    {{ garageStore.yearsOld(car) }}
                                    <span class="text-sm">Years Old</span>
                                </p>
                            </div>
                            <div class="mileage">
                                <p class="text-gray-50 mr-2 my-1">
                                    {{ numberWithCommas(car.mileage) }}
                                    <span class="text-sm">Miles</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Year and title as link to FB listing -->
                    <div>
                        <a :href="car.url">
                            <h5
                                class="mx-2 mt-3 text-xl font-bold tracking-tight text-gray-900 dark:text-white"
                            >
                                {{ car.year }} {{ car.title }}
                            </h5>
                        </a>
                    </div>
                    <!-- Price & Mileage -->
                    <div class="grow mx-2">
                        <div
                            class="flex justify-between mb-3 font-normal text-gray-700 dark:text-gray-400"
                        >
                            <div>${{ numberWithCommas(car.price) }}</div>
                        </div>
                        <div
                            class="font-normal text-gray-700 dark:text-gray-400"
                        >
                            <a
                                class="has-tooltip"
                                :href="
                                    'https://www.google.com/maps/search/?api=1&query=' +
                                    car.city +
                                    car.state
                                "
                                target="_blank"
                            >
                                <span
                                    class="tooltip rounded shadow-lg p-1 bg-gray-900 text-gray-100 -mt-10 pl-2 pr-2"
                                    >Open Map</span
                                >
                                {{ car.city }}, {{ car.state }}
                            </a>
                        </div>
                    </div>
                    <div class="mx-2 mb-2 mt-4 icon-list">
                        <ListingIcons :car="car" />
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!-- <table
            v-if="garageStore.results.length"
            class="ml-2 mr-2 table-auto text-gray-200 min-w-full divide-y divide-gray-200 dark:divide-neutral-700"
        >
            <thead>
                <th>Title</th>
                <th>Price</th>
                <th class="w-1/4">Image</th>
                <th>Location</th>
            </thead>
            <tbody>
                <tr v-for="(r, i) in garageStore.results" :key="i">
                    <td>{{ car.title }}</td>
                    <td>{{ car.price }}</td>
                    <td>
                        <a :href="car.url" target="_blank"
                            ><img :src="car.image"
                        /></a>
                    </td>
                    <td>{{ car.city }}, {{ car.state }}</td>
                </tr>
            </tbody>
        </table> -->
        </div>
    </div>
</template>

<style scoped lang="scss">
.listing-card:not(:hover) .icon-list {
    opacity: 0;
}
</style>
