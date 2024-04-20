<script setup lang="ts">
import { useAppStore } from "~/stores/app";

const app = useAppStore();
</script>

<template>
<a class="stars-container" href="https://github.com/buggregator/server" target="_blank">
  <div class="text">
    <img class="w-6 h-6" src="~/assets/img/github.svg" alt="GitHub Logo"/> GitHub
  </div>
  <span class="stars">★ {{ app.stars }}</span>
</a>
</template>

<style scoped lang="scss">
.stars-container {
  @apply bg-gray-800 text-white rounded-full flex items-center gap-6 border bg-gray-800 hover:bg-blue-600 transition px-3 py-2 cursor-pointer;

  .text {
    @apply flex items-center gap-2;
  }

  .stars {
    @apply break-keep text-nowrap;
  }
}
</style>