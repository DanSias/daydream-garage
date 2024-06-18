<script setup>
import { Link } from "@inertiajs/vue3";
import "car-makes-icons/dist/style.css";
let brandList = [
    'Acura',
    'BMW',
    'Chevrolet',
    'Dodge',
    'Ford',
    'Honda',
    'Mazda',
    'Mitsubishi',
    'Nissan',
    'Porsche',
    'Subaru',
    'Toyota',
]

let popularCars = [
    'Acura Integra',
    'BMW M3',
    'Chevrolet Corvette',
    'Dodge Challenger',
    'Ford Mustang',
    'Honda Civic',
    'Mazda MX-5',
    'Mitsubishi Eclipse',
    'Nissan 240SX',
    'Porsche 911',
    'Subaru WRX',
    'Toyota 86'
]
</script>

<template>
    <div>
        <div
            class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700"
        >
            <div class="flex items-center">
                <svg
                    class="size-10 text-gray-400"
                    fill="#9ca3af"
                    version="1.1"
                    id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="800px"
                    height="800px"
                    viewBox="0 0 31.445 31.445"
                    xml:space="preserve"
                >
                    <g>
                        <g>
                            <path
                                d="M7.592,16.86c-1.77,0-3.203,1.434-3.203,3.204s1.434,3.204,3.203,3.204c1.768,0,3.203-1.434,3.203-3.204    S9.36,16.86,7.592,16.86z M7.592,21.032c-0.532,0-0.968-0.434-0.968-0.967s0.436-0.967,0.968-0.967    c0.531,0,0.966,0.434,0.966,0.967S8.124,21.032,7.592,21.032z"
                            />
                            <path
                                d="M30.915,17.439l-0.524-4.262c-0.103-0.818-0.818-1.418-1.643-1.373L27.6,11.868l-3.564-3.211    c-0.344-0.309-0.787-0.479-1.249-0.479l-7.241-0.001c-1.625,0-3.201,0.555-4.468,1.573l-4.04,3.246l-5.433,1.358    c-0.698,0.174-1.188,0.802-1.188,1.521v1.566C0.187,17.44,0,17.626,0,17.856v2.071c0,0.295,0.239,0.534,0.534,0.534h3.067    c-0.013-0.133-0.04-0.26-0.04-0.396c0-2.227,1.804-4.029,4.03-4.029s4.029,1.802,4.029,4.029c0,0.137-0.028,0.264-0.041,0.396    h8.493c-0.012-0.133-0.039-0.26-0.039-0.396c0-2.227,1.804-4.029,4.029-4.029c2.227,0,4.028,1.802,4.028,4.029    c0,0.137-0.026,0.264-0.04,0.396h2.861c0.295,0,0.533-0.239,0.533-0.534v-1.953C31.449,17.68,31.21,17.439,30.915,17.439z     M20.168,12.202l-10.102,0.511L12,11.158c1.051-0.845,2.357-1.305,3.706-1.305h4.462V12.202z M21.846,12.117V9.854h0.657    c0.228,0,0.447,0.084,0.616,0.237l2.062,1.856L21.846,12.117z"
                            />
                            <path
                                d="M24.064,16.86c-1.77,0-3.203,1.434-3.203,3.204s1.434,3.204,3.203,3.204c1.769,0,3.203-1.434,3.203-3.204    S25.833,16.86,24.064,16.86z M24.064,21.032c-0.533,0-0.967-0.434-0.967-0.967s0.434-0.967,0.967-0.967    c0.531,0,0.967,0.434,0.967,0.967S24.596,21.032,24.064,21.032z"
                            />
                        </g>
                    </g>
                </svg>

                <h2
                    class="ms-3 text-xl font-semibold text-gray-900 dark:text-white"
                >
                    <a href="https://laravel.com/docs">Find Your Next Car</a>
                </h2>
            </div>
            <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                The fun of car shopping on FB Marketplace, without all the
                hassle of FB Marketplace, the premiere tool for browsing,
                saving, and sharing cars from online marketplaces. Whether
                you’re a seasoned car enthusiast, a casual browser, or someone
                on the hunt for their next dream ride, Seamlessly explore a vast
                array of vehicles from the comfort of your home, organize your
                favorite finds in personalized collections, and share your top
                picks with friends and fellow car lovers. Start your journey
                with Daydream Garage today and turn your automotive dreams into
                reality.
                <Link
                    href="cars"
                    class="font-semibold text-indigo-700 dark:text-indigo-300"
                    >Start Browsing Now!
                </Link>
            </p>
        </div>

        <div
            class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8"
        >
            <div>
                <div class="flex items-center">
                    <h2
                        class="ms-3 text-xl font-semibold text-gray-900 dark:text-white"
                    >
                        <i class="car-mitsubishi mr-2"></i>
                        <i class="car-bmw mr-2"></i>
                        <i class="car-toyota mr-2"></i>
                        <i class="car-porsche mr-2"></i>
                        <i class="car-subaru mr-2"></i>
                        Browse by Brand
                        <i class="car-ford mr-2"></i>
                        <i class="car-honda mr-2"></i>
                        <i class="car-mazda mr-2"></i>
                        <i class="car-nissan mr-2"></i>
                        <i class="car-audi mr-2"></i>
                    </h2>
                </div>

                <p
                    class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"
                >
                <div class="columns-2">
                    <div v-for="brand in brandList" class="flex">
                        <div class="mt-2 text-3xl mr-2">
                            <Link :href="'cars/' + brand" class="text-2xl">
                                <i :class="'car-' + brand.toLowerCase() "></i>
                            </Link>
                        </div>
                        <div class="mt-2 ml-2"><Link :href="'cars/' + brand" class="text-2xl">{{ brand }}</Link></div>
                    </div>
                </div>

                </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-400">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
</svg>

                    <h2
                        class="ms-3 text-xl font-semibold text-gray-900 dark:text-white"
                    >
                        <a href="https://laracasts.com">Most Popular Cars</a>
                    </h2>
                </div>

                <div class="columns-2 mt-6">
                <p class="mb-4" v-for="car in popularCars">
                    <Link
                        :href="'/cars/' + car.replace(' ', '/')"
                        class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300"
                    >
                        {{ car }}

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </Link>
                </p>
            </div>
            </div>


        </div>
    </div>
</template>
