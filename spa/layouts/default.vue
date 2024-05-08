<template>
  <div class="main-layout">
    <Navbar/>
    <slot/>
  </div>
  <WidgetContainerModal/>
  <VuePreloader
    v-if="showPreloader"
    background-color="#111827"
    color="#ffffff"
    transition-type="fade-down"
    :loading-speed="10"
    :transition-speed="500"
  />
</template>

<style lang="scss" scoped>
.main-layout {
  @apply w-full min-w-96;
}
</style>

<script setup lang="ts">
import { container as WidgetContainerModal } from "jenesius-vue-modal";
import Navbar from "~/layouts/_components/Navbar.vue";
import { VuePreloader } from 'vue-preloader';
import '../node_modules/vue-preloader/dist/style.css'
import { useAppStore } from "~/stores/app";

const store = useAppStore();
const showPreloader = computed(() => store.loading);
</script>