<template>
  <div class="main-layout">
    <Navbar />
    <slot />
  </div>
  <WidgetContainerModal />
</template>

<style lang="scss" scoped>
.main-layout {
  @apply w-full min-w-96;
}
</style>

<script setup lang="ts">
import {container as WidgetContainerModal} from "jenesius-vue-modal";
import Navbar from "~/layouts/_components/Navbar.vue";
</script>