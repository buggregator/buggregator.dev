<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import CopyCommand from "~/components/v1/CopyCommand.vue";
import GithubStars from "~/components/v1/GithubStars.vue";
</script>

<template>
  <div class="bg-white py-16">
    <GridRow>

      <h3 class="section-title text-blue-800">Trap</h3>

      <p class="section-body text-gray-500">
        Trap is a lightweight, standalone debugging tool designed to be integrated with PHP
        applications. It is distributed as a Composer package and includes a suite of utilities that
        significantly enhance the debugging capabilities traditionally available in PHP environments.
      </p>

      <div class="mb-10 flex">
        <CopyCommand text="composer require --dev buggregator/trap -W"/>
      </div>

      <div class="flex gap-6">
        <a href="https://docs.buggregator.dev/trap/what-is-trap.html" target="_blank" class="read-more-link blue">
          Read more
        </a>
        <GithubStars repository="trap"/>
      </div>

    </GridRow>
  </div>
</template>

<style scoped lang="scss">

</style>