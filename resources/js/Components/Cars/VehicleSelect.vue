<script setup>
import SettingsModal from "./SettingsModal.vue";
import { router } from "@inertiajs/vue3";
import { makes, models } from "@/cars";
import { useFilterStore } from "@/Stores/Filter";
const filterStore = useFilterStore();
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

// Redirect when car is changed
const changeMake = (event) => {
    let url = "/cars/" + event.target.value;
    router.visit(url, { method: "get" });
};
const changeModel = (event) => {
    let url = "/cars/" + filterStore.make + "/" + event.target.value;
    router.visit(url, { method: "get" });
};
</script>

<template>
    <div class="flex">
        <div class="w-1/4">
            <select
                v-model="filterStore.make"
                @change="changeMake($event)"
                class="w-5/6"
            >
                <option disabled value="">Select Make...</option>
                <option v-for="brand in makes" :value="brand">
                    {{ brand }}
                </option>
            </select>
        </div>

        <div class="w-1/4">
            <select
                v-model="filterStore.model"
                @change="changeModel($event)"
                class="w-5/6"
            >
                <option disabled value="">Select Model...</option>
                <option v-for="car in models[filterStore.make]" :value="car">
                    {{ car }}
                </option>
            </select>
        </div>
        <div class="flex-grow text-white">&nbsp;</div>
        <div>
            <SettingsModal />
        </div>
    </div>
</template>
