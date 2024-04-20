<script setup lang="ts">

import Feature from "~/components/v1/Features/Feature.vue";
</script>

<template>
  <Feature>
    <svg class="w-8 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path fill="currentColor"
            d="M64 32C28.7 32 0 60.7 0 96v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm48 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM64 288c-35.3 0-64 28.7-64 64v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V352c0-35.3-28.7-64-64-64H64zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm56 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"
            data-v-d08416bc="" class=""></path>
    </svg>
    <div>
      <h3 class="feature-title">External database support</h3>
      <p class="feature-text mb-6">
        Configure Buggregator to use external databases like MongoDB or
        PostgreSQL for event storage. This flexibility allows you to scale storage according to your
        project needs.
      </p>

      <a href="https://docs.buggregator.dev/config/external-db.html"
         target="_blank"
         class="read-more-link green"
      >
        Read more
      </a>
    </div>
  </Feature>
</template>

<style scoped lang="scss">

</style>