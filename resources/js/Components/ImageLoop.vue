<script setup>
import { reactive, shallowReactive } from "vue";
import {
    VueFlux,
    FluxPreloader,
    FluxControls,
    FluxPagination,
    Img,
    Swipe,
    Blocks2,
    Warp,
    Cube,
    Book,
    Wave,
    Blinds3D,
    Round2,
} from "vue-flux";

const options = reactive({
    allowFullscreen: false,
    allowToSkipTransition: true,
    autohideTime: 2500,
    autoplay: false,
    bindKeys: false,
    delay: 5000,
    enableGestures: false,
    infinite: true,
    lazyLoad: true,
    lazyLoadAfter: 3,
});

const rscs = shallowReactive([
    new Img("/img/civic.png"),
    new Img("/img/240sx.png"),
    new Img("img-url-3"),
]);

const transitions = shallowReactive([
    Swipe,
    Blocks2,
    Warp,
    Cube,
    Book,
    Wave,
    Blinds3D,
    Round2,
]);
</script>

<template>
    <div>
        <img
            src="/img/civic.png"
            alt="Laravel documentation screenshot"
            class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
        />
    </div>
</template>

<style lang="scss" scoped></style>
