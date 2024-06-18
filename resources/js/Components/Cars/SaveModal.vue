<script setup>
import { ref } from "vue";
import { useGarageStore } from "@/Stores/Garage";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";

const props = defineProps({
    car: {
        type: Object,
        default: {},
    },
});

const garageStore = useGarageStore();
const isOpen = ref(false);

function closeModal() {
    isOpen.value = false;
}
function openModal() {
    isOpen.value = true;
}
</script>

<template>
    <div>
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-6 text-yellow-100 cursor-pointer"
            @click="openModal()"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
            />
        </svg>
    </div>
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
                            class="w-full max-w-xl transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <div class="flex justify-between">
                                <DialogTitle
                                    as="h3"
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Save this Car in Your Garage
                                </DialogTitle>
                                <div class="close-button" @click="closeModal()">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="size-6 cursor-pointer text-gray-400 hover:text-gray-600"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6 18 18 6M6 6l12 12"
                                        />
                                    </svg>
                                </div>
                            </div>

                            <div class="mt-2">
                                <img class="w-full" :src="props.car.image" />
                            </div>

                            <p class="mt-2 text-sm text-gray-500">
                                You can set a category and a note to organize
                                it.
                            </p>
                            <div class="flex mt-2">
                                <div class="w-1/2">
                                    <div>
                                        <label
                                            for="category"
                                            class="block text-sm font-medium leading-6 text-gray-900"
                                            >Category</label
                                        >
                                        <div
                                            class="relative rounded-md shadow-sm"
                                        >
                                            <div
                                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                            ></div>
                                            <input
                                                type="text"
                                                name="category"
                                                id="category"
                                                v-model="garageStore.category"
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
                                        for="note"
                                        class="block text-sm font-medium leading-6 text-gray-900"
                                        >Note
                                    </label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                        ></div>
                                        <input
                                            type="text"
                                            name="note"
                                            id="note"
                                            v-model="garageStore.category"
                                            class="w-full"
                                        />
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center"
                                        ></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button
                                    type="button"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                    @click="garageStore.saveCar(car)"
                                >
                                    Save!
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
