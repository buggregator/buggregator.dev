<script setup lang="ts">
import { YoutubeVue3 as Youtube } from 'youtube-vue3'
</script>

<template>
  <div class="video-container">
    <Youtube videoid="yKWbuw8xN_c"
             class="w-full h-full"
             controls="0"
             :autoplay="true"
             :loop="false"/>
  </div>
</template>

<style scoped lang="scss">
.video-container {
  @apply aspect-video w-3/4 rounded-xl overflow-hidden drop-shadow-2xl;

}
</style>