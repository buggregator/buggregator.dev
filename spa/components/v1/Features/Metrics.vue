<script setup lang="ts">
import Feature from "~/components/v1/Features/Feature.vue";
</script>

<template>
  <Feature>
    <div class="feature-grid">
      <svg role="img" xmlns="http://www.w3.org/2000/svg" class="w-8 text-red-400" viewBox="0 0 52 52" xml:space="preserve"><path fill="currentColor" d="M44.9 2H7.1C4.3 2 2 4.3 2 7.1v37.7C2 47.7 4.3 50 7.1 50h37.7c2.8 0 5.1-2.3 5.1-5.1V7.1c.1-2.8-2.2-5.1-5-5.1zM15.7 39.7c0 .9-.8 1.7-1.7 1.7h-1.7c-.9 0-1.7-.8-1.7-1.7v-9.4c0-.9.8-1.7 1.7-1.7H14c.9 0 1.7.8 1.7 1.7v9.4zm8.6 0c0 .9-.8 1.7-1.7 1.7h-1.7c-.9 0-1.7-.8-1.7-1.7V17.4c0-.9.8-1.7 1.7-1.7h1.7c.9 0 1.7.8 1.7 1.7v22.3zm8.6 0c0 .9-.8 1.7-1.7 1.7h-1.7c-.9 0-1.7-.8-1.7-1.7V12.3c0-.9.8-1.7 1.7-1.7h1.7c.9 0 1.7.8 1.7 1.7v27.4zm8.5 0c0 .9-.8 1.7-1.7 1.7H38c-.9 0-1.7-.8-1.7-1.7V23.4c0-.9.8-1.7 1.7-1.7h1.7c.9 0 1.7.8 1.7 1.7v16.3z"/></svg>
      <div>
        <h3 class="feature-title">Metrics</h3>
        <p class="feature-text">Monitor application errors in real-time with Buggregator's metrics. It provides
          prometheus metrics, that can be used to monitor errors and exceptions in your application using Grafana.
        </p>
      </div>
    </div>
    <div>
      <a href="https://docs.buggregator.dev/config/metrics.html" target="_blank" class="read-more-link">
        Read more
      </a>
    </div>
  </Feature>
</template>

<style scoped lang="scss">

</style>