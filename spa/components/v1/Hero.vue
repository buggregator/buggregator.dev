<template>
  <GridRow class="hero">
    <GithubStars repository="server"/>

    <h1 class="title">
      <span class="block mb-4 text-black">Buggregator</span>
      <span><small class="text-blue-800">The Ultimate Debugging Server</small></span>
    </h1>

    <p class="text">
      It works seamlessly with the libraries you already use, like Ray, Symfony/VarDumper, Monolog, Sentry, etc. The
      goal was to simplify the integration process and provide a centralized server to manage and display all the data
      from your project.
    </p>

    <div class="buttons">
      <NuxtLink href="#demo" class="demo">
        Try demo
      </NuxtLink>
      <NuxtLink href="#install" class="install">
        How to run
      </NuxtLink>
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
  @apply text-lg text-gray-500 mb-10 sm:mb-11 text-center w-2/3;
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

  .install {
    @apply font-semibold leading-6 text-blue-800 hover:text-blue-700 hover:bg-blue-100;
    @apply px-6 py-3;
    @apply rounded-md;
    @apply transition-colors;
    @apply focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white;
  }
}
</style>