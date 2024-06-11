<script setup lang="ts">
import { YoutubeVue3 as Youtube } from 'youtube-vue3'
</script>

<template>
  <div class="video-container">
    <Youtube videoid="2QbgjIVnz78"
             class="w-full h-full"
             controls="1"
             :autoplay="true"
             :loop="false"/>
  </div>
</template>

<style scoped lang="scss">
.video-container {
  @apply aspect-video w-full md:w-3/4 md:rounded-xl overflow-hidden drop-shadow-2xl;

}
</style>