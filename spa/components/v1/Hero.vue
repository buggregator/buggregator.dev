<template>
  <GridRow class="hero">
    <GithubStars/>

    <h1 class="title">
      <span class="block mb-4 text-black">Buggregator</span>
      <span><small class="text-blue-800">The Ultimate Debugging Server for PHP</small></span>
    </h1>

    <p class="text">
      Buggregator is a free Swiss Army knife for developers. What makes it special is that it offers a range
      of features that you would usually find in various paid tools, but it's available for free.
    </p>

    <div class="buttons">
      <a href="#demo" class="demo">Try demo</a>
      <a href="https://docs.buggregator.dev" class="docs">
        Documentation
      </a>
    </div>
  </GridRow>
</template>

<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import GithubStars from "~/components/v1/GithubStars.vue";
</script>

<style scoped lang="scss">
.hero {
  @apply flex flex-col items-center bg-white -mt-24 rounded-xl shadow-2xl py-16;
}

.title {
  @apply mt-8 text-3xl sm:text-4xl lg:text-5xl leading-none font-extrabold tracking-tight mb-4 text-center;
}

.text {
  @apply text-lg text-gray-500 mb-10 sm:mb-11 text-center w-2/3 xl:w-1/2;
}

.buttons {
  @apply flex items-center justify-center gap-x-6 lg:justify-start mb-8;

  .demo {
    @apply px-6 py-3;
    @apply bg-blue-800 hover:bg-blue-700;
    @apply rounded-md shadow-sm;
    @apply focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white;
    @apply font-semibold text-white;
  }

  .docs {
    @apply font-semibold leading-6 text-blue-800;
  }
}
</style>