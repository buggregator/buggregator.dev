<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import CopyCommand from "~/components/v1/CopyCommand.vue";

</script>

<template>
  <div class="block-wrapper">
    <GridRow>
      <h3 class="section-title">
        How to run?
      </h3>

      <p class="section-body">
        Getting Buggregator up and running is super simple! Just make sure Docker is installed on your server. Then, run
        this command in your terminal:
      </p>

      <div class="mb-10 flex">
        <CopyCommand
          text="docker run -p 8000:8000 -p 1025:1025 -p 9912:9912 -p 9913:9913 ghcr.io/buggregator/server:latest"/>
      </div>

      <a href="https://docs.buggregator.dev/getting-started.html" target="_blank" class="read-more-link gray">
        Read more
      </a>
    </GridRow>
  </div>
</template>

<style scoped lang="scss">
.block-wrapper {
  @apply bg-gray-900 py-20 mt-24;

  .section-title {
    @apply text-yellow-200;
  }

  .section-body {
    @apply text-gray-200;
  }
}
</style>