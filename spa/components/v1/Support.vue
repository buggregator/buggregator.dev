<script setup lang="ts">
import GithubStars from "~/components/v1/GithubStars.vue";
</script>

<template>
  <div class="support">
    <div class="text">We need your support! <br> Please star the project on GitHub.</div>

    <GithubStars repository="server" size="lg" />
  </div>
</template>

<style scoped lang="scss">
.support {
  @apply flex flex-col mt-8 justify-center items-center;

  .text {
    @apply text-lg font-semibold text-center text-blue-600 relative mb-6;
  }
}
</style>