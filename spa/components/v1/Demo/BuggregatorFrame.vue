<script setup lang="ts">
import { useAppStore } from "~/stores/app";

const app = useAppStore();
</script>

<template>
  <div>
    <div class="p-0 sticky top-0 h-screen">
      <div class="flex flex-col items-center">
          <iframe class="frame" :src="app.buggregator_url" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.frame {
  @apply w-full h-screen md:shadow-xl md:rounded-r-xl bg-white;
}
</style>