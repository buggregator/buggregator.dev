<script setup lang="ts">
import Frame from "~/components/v1/Demo/BuggregatorFrame.vue";
import Buttons from "~/components/v1/Demo/Buttons.vue";
</script>

<template>
  <div class="demo" id="demo">
    <Frame class="relative flex-1"/>
    <Buttons />
  </div>
</template>

<style scoped lang="scss">
.demo {
  @apply mt-24 flex gap-0 md:gap-4 mb-24;
}
</style>