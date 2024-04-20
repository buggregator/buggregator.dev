<template>
  <div class="main-layout">
    <Navbar />
    <slot />
  </div>
</template>

<style lang="scss" scoped>
.main-layout {
  @apply w-full min-w-96;
}
</style>

<script setup lang="ts">
import Navbar from "~/layouts/_components/Navbar.vue";
</script>