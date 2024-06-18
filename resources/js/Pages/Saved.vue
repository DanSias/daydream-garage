<script setup>
import { onMounted, ref, reactive, computed } from "vue";

import { useGarageStore } from "@/Stores/Garage";
const garageStore = useGarageStore();

import { useFilterStore } from "@/Stores/Filter";
const filterStore = useFilterStore();

import AppLayout from "@/Layouts/AppLayout.vue";

const savedType = ref("mine");

const props = defineProps({
    savedAll: {
        type: Array,
        default: [],
    },
    savedMine: {
        type: Array,
        default: [],
    },
    ignored: {
        type: Array,
        default: [],
    },
});

const visible = computed(() => {
    let array = [];
    if (savedType == "mine") {
        array = props.savedMine;
    } else if (savedType == "all") {
        array = props.savedAll;
    } else if (savedType == "ignored") {
        array = props.ignored;
    }
    return array;
});

const numberWithCommas = (x) => {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};
</script>

<template>
    <AppLayout title="Cars">
        <template #header>
            <select v-model="savedType" class="w-2/6">
                <option disabled value="">Select Option...</option>
                <option value="mine">My Saved Cars</option>
                <option value="all">All Saved Cars</option>
                <option value="ignored">Ignored Cars</option>
            </select>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                ></div>
            </div>
        </div>
        <div class="mx-4">
            <div v-for="s in savedMine" class="mb-4 bg-gray-800 flex">
                <div>
                    <a :href="s.url" target="_blank">
                        <img :src="s.image" />
                    </a>
                </div>
                <div class="mt-6 ml-4">
                    <a :href="s.url" target="_blank">
                        <h4 class="text-4xl text-gray-200">
                            {{ s.year }} {{ s.title }}
                        </h4>
                    </a>
                    <!-- Age and Mileage Overlay -->
                    <div class="mt-4">
                        <div class="flex">
                            <div class="years-old">
                                <p class="text-gray-50 ml-2 my-1 text-xl">
                                    {{ garageStore.yearsOld(s) }}
                                    <span class="">Years Old</span>
                                </p>
                            </div>
                            <div class="mileage ml-8">
                                <p class="text-gray-50 mr-2 my-1 text-xl">
                                    {{ numberWithCommas(s.mileage) }}
                                    <span class="">Miles</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="grow flex-grow mx-2 mt-4">
                            <div
                                class="text-xl flex justify-between mb-3 font-normal text-gray-700 dark:text-gray-300"
                            >
                                <div>${{ numberWithCommas(s.price) }}</div>
                            </div>
                            <div
                                class="font-normal text-gray-700 dark:text-gray-400"
                            >
                                <a
                                    class="has-tooltip"
                                    :href="
                                        'https://www.google.com/maps/search/?api=1&query=' +
                                        s.city +
                                        s.state
                                    "
                                    target="_blank"
                                >
                                    <span
                                        class="tooltip rounded shadow-lg p-1 bg-gray-900 text-gray-100 -mt-10 pl-2 pr-2 text-xl"
                                        >Open Map</span
                                    >
                                    {{ s.city }}, {{ s.state }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 cursor-pointer has-tooltip">
                        <span
                            @click="garageStore.deleteCar(s.id)"
                            class="tooltip rounded shadow-lg p-1 bg-gray-900 text-gray-100 -ml-9 -mt-10 pl-2 pr-2"
                            >Delete Car</span
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-6 text-red-400"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                            />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
