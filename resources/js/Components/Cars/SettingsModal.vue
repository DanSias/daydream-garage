<script setup>
import { useGarageStore } from "@/Stores/Garage";
const garageStore = useGarageStore();

import { ref } from "vue";
import { useFilterStore } from "@/Stores/Filter";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";

const filterStore = useFilterStore();
const isOpen = ref(false);

const distances = [10, 25, 50, 75, 100, 200, 500, 1000, 2000];

function closeModal() {
    isOpen.value = false;
}
function openModal() {
    isOpen.value = true;
}
</script>

<template>
    <!-- Gear SVG from heroicons -->
    <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="mt-1 size-8 text-gray-200 cursor-pointer"
        @click="openModal()"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z"
        />
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
        />
    </svg>

    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black/25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <DialogTitle
                                as="h3"
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                Search Radius
                            </DialogTitle>

                            <p class="mt-2 text-sm text-gray-500">
                                How far from home do you want to look?
                            </p>
                            <div class="flex mt-2">
                                <div class="w-1/2">
                                    <div>
                                        <label
                                            for="zipcode"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                            >Zip Code</label
                                        >
                                        <div
                                            class="relative rounded-md shadow-sm"
                                        >
                                            <div
                                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                            ></div>
                                            <input
                                                type="text"
                                                name="zipcode"
                                                id="zipcode"
                                                v-model="filterStore.zipcode"
                                                class="w-5/6"
                                            />
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <label
                                        for="searchradius"
                                        class="block text-sm font-medium leading-6 text-gray-900"
                                        >Distance (Miles)
                                    </label>
                                    <select
                                        v-model="filterStore.searchradius"
                                        name="searchradius"
                                        id="searchradius"
                                        class="w-5/6"
                                    >
                                        <option disabled value="">
                                            Radius
                                        </option>
                                        <option
                                            v-for="dis in distances"
                                            :value="dis"
                                        >
                                            {{ dis }} Miles
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <hr class="mt-6 mb-4" />
                            <DialogTitle
                                as="h3"
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                Year
                            </DialogTitle>

                            <p class="mt-2 text-sm text-gray-500">
                                How old of a car do you want?
                            </p>
                            <div class="flex mt-2">
                                <div class="w-1/2">
                                    <div>
                                        <label
                                            for="yearmin"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                            >Min</label
                                        >
                                        <div
                                            class="relative rounded-md shadow-sm"
                                        >
                                            <div
                                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                            ></div>
                                            <input
                                                type="text"
                                                name="yearmin"
                                                id="yearmin"
                                                v-model="filterStore.yearmin"
                                                class="w-5/6"
                                            />
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <label
                                        for="yearmax"
                                        class="block text-sm font-medium leading-6 text-gray-900"
                                        >Max
                                    </label>
                                    <input
                                        type="text"
                                        name="yearmax"
                                        id="yearmax"
                                        v-model="filterStore.yearmax"
                                        class="w-5/6"
                                    />
                                </div>
                            </div>

                            <hr class="mt-6 mb-4" />
                            <DialogTitle
                                as="h3"
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                Mileage
                            </DialogTitle>

                            <p class="mt-2 text-sm text-gray-500">
                                How well enjoyed should it be?
                            </p>
                            <div class="flex mt-2">
                                <div class="w-1/2">
                                    <div>
                                        <label
                                            for="mileagemin"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                            >Min</label
                                        >
                                        <div
                                            class="relative rounded-md shadow-sm"
                                        >
                                            <div
                                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                            ></div>
                                            <input
                                                type="text"
                                                name="mileagemin"
                                                id="mileagemin"
                                                v-model="filterStore.mileagemin"
                                                class="w-5/6"
                                            />
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <label
                                        for="mileagemax"
                                        class="block text-sm font-medium leading-6 text-gray-900"
                                        >Max
                                    </label>
                                    <input
                                        type="text"
                                        name="mileagemax"
                                        id="mileagemax"
                                        v-model="filterStore.mileagemax"
                                        class="w-5/6"
                                    />
                                </div>
                            </div>

                            <hr class="mt-6 mb-4" />
                            <DialogTitle
                                as="h3"
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                Price Range
                            </DialogTitle>

                            <p class="mt-2 text-sm text-gray-500">
                                How much do you want to spend?
                            </p>
                            <div class="flex mt-2">
                                <div class="w-1/2">
                                    <div>
                                        <label
                                            for="pricemin"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                            >Min</label
                                        >
                                        <div
                                            class="relative rounded-md shadow-sm"
                                        >
                                            <div
                                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                            ></div>
                                            <input
                                                type="text"
                                                name="pricemin"
                                                id="pricemin"
                                                v-model="filterStore.pricemin"
                                                class="w-5/6"
                                            />
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <label
                                        for="pricemax"
                                        class="block text-sm font-medium leading-6 text-gray-900"
                                        >Max
                                    </label>
                                    <input
                                        type="text"
                                        name="pricemax"
                                        id="pricemax"
                                        v-model="filterStore.pricemax"
                                        class="w-5/6"
                                    />
                                </div>
                            </div>

                            <div class="mt-4">
                                <button
                                    type="button"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                    @click="closeModal"
                                >
                                    Save Settings
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
