<script setup lang="ts">
import Feature from "~/components/v1/Features/Feature.vue";
</script>

<template>
  <Feature>
    <div class="feature-grid">
      <svg role="img" viewBox="-10 -5 1034 1034" class="w-8 text-teal-400" xmlns="http://www.w3.org/2000/svg">
        <path fill="currentColor"
              d="M482 226h-1l-10 2q-33 4-64.5 18.5T351 285q-41 37-57 91-9 30-8 63t12 63q17 45 52 78l13 12-83 135q-26-1-45 7-30 13-45 40-7 15-9 31t2 32q8 30 33 48 15 10 33 14.5t36 2 34.5-12.5 27.5-25q12-17 14.5-39t-5.5-41q-1-5-7-14l-3-6 118-192q6-9 8-14l-10-3q-9-2-13-4-23-10-41.5-27.5T379 484q-17-36-9-75 4-23 17-43t31-34q37-27 82-27 27-1 52.5 9.5T597 345q17 16 26.5 38.5T634 429q0 17-6 42l70 19 8 1q14-43 7-86-4-33-19.5-63.5T654 288q-42-42-103-56-6-2-18-4l-14-2h-37zm18 124q-17 0-34 7t-30.5 20.5T416 409q-8 20-4 44 3 18 14 34t28 25q24 15 56 13 3 4 5 8l112 191q3 6 6 9 27-26 58.5-35.5t65-3.5 58.5 26q32 25 43.5 61.5t.5 73.5q-8 28-28.5 50T782 938q-31 13-66.5 8.5T652 922q-4-3-13-10l-5-6q-4 3-11 10l-47 46q23 23 52 38.5t61 21.5l22 4h39l28-5q64-13 110-60 22-22 36.5-50.5T944 851q5-36-2-71.5T917 715t-44-51-57-35q-34-14-70.5-16t-71.5 7l-17 5-81-137q13-19 16-37 5-32-13-60-16-25-44-35-17-6-35-6zM218 614q-58 13-100 53-47 44-61 105l-4 24v37l2 11q2 13 4 20 7 31 24.5 59t42.5 49q50 41 115 49 38 4 76-4.5t70-28.5q53-34 78-91 7-17 14-45 6-1 18 0l125 2q14 0 20 1 11 20 25 31t31.5 16 35.5 4q28-3 50-20 27-21 32-54 2-17-1.5-33T801 769q-16-22-41-32-17-7-35.5-6.5T689 738q-28 12-43 37l-3 6q-14 0-42-1l-113-1q-15-1-43-1l-50-1 3 17q8 43-13 81-14 27-40 45t-57 22q-35 6-70-7.5T161 892q-28-35-27-79 1-37 23-69 13-19 32-32t41-19l9-3z"/>
      </svg>
      <div>
        <h3 class="feature-title">Webhooks</h3>
        <p class="feature-text">Use webhooks for integration with third-party services like
          <a href="https://n8n.io" class="text-link">n8n</a>. For example, you can use webhooks to send notification
          when an error in your application is occurred.
        </p>
      </div>
    </div>
    <div>
      <a href="https://docs.buggregator.dev/config/webhooks.html" target="_blank" class="read-more-link">
        Read more
      </a>
    </div>
  </Feature>
</template>

<style scoped lang="scss">

</style>