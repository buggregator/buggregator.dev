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
      <button @click="openVideo" class="video">
        <svg viewBox="0 0 28.57 20" class="w-12" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M27.97 3.12A3.58 3.58 0 0 0 25.45.6C23.22 0 14.29 0 14.29 0S5.35 0 3.12.6A3.58 3.58 0 0 0 .6 3.12C0 5.35 0 10 0 10s0 4.65.6 6.88a3.58 3.58 0 0 0 2.52 2.52c2.23.6 11.17.6 11.17.6s8.93 0 11.16-.6a3.58 3.58 0 0 0 2.52-2.52c.6-2.23.6-6.88.6-6.88s0-4.65-.6-6.88Z"
            fill="red"/>
          <path d="M11.43 14.29 18.85 10l-7.42-4.28v8.57Z" fill="#fff"/>
        </svg>
        <span>Watch video</span>
      </button>
      <NuxtLink href="#demo" class="demo" @click="tryDemo">
        Try demo
      </NuxtLink>
      <NuxtLink href="#install" class="install" @click="install">
        Let's install
      </NuxtLink>
    </div>
  </GridRow>
</template>

<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import GithubStars from "~/components/v1/GithubStars.vue";
import { openModal } from "jenesius-vue-modal";
import IntroVideo from "~/components/v1/IntroVideo.vue";

const { gtag } = useGtag()

const openVideo = async () => {
  gtag('event', 'open_intro_video', {
    label: 'open_intro_video',
    component: 'hero',
  });

  await openModal(IntroVideo, {})
};

const install = () => {
  gtag('event', 'install', {
    label: 'install',
    component: 'hero',
  });
};

const tryDemo = () => {
  gtag('event', 'try_demo', {
    label: 'try_demo',
    component: 'hero',
  });
};
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
  @apply flex flex-col sm:flex-row items-center justify-center gap-6 lg:justify-start mb-8;

  .demo {
    @apply px-3 py-2 md:px-6 md:py-3;
    @apply bg-blue-800 hover:bg-blue-700;
    @apply rounded-md shadow-sm;
    @apply focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white;
    @apply text-white text-sm md:text-base;
  }

  .video {
    @apply flex items-center gap-x-4;
    @apply pl-4 pr-6 py-3;
    @apply bg-gray-800 hover:bg-gray-700;
    @apply rounded-md shadow-sm;
    @apply focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white;
    @apply font-semibold text-white;
  }

  .install {
    @apply leading-6 text-blue-800 hover:text-blue-700 hover:bg-blue-100 border;
    @apply px-3 py-2 md:px-6 md:py-3;
    @apply rounded-md;
    @apply transition-colors;
    @apply text-sm md:text-base;
    @apply focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white;
  }
}
</style>