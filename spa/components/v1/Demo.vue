<script setup lang="ts">
import Frame from "~/components/v1/Demo/BuggregatorFrame.vue";
import Buttons from "~/components/v1/Demo/Buttons.vue";
import GridRow from "~/components/v1/GridRow.vue";
</script>

<template>
  <div class="demo" id="demo">

    <GridRow class="relative">
      <h3 class="title text-blue-800">Experience Buggregator in Action</h3>

      <p class="description">
        <strong>On the left side, you'll see the Buggregator interface.</strong> On the right, we've prepared predefined actions, each
        represented by a button. By interacting with these buttons, you can actively send sample dumps to
        the Buggregator, simulating real debugging scenarios in real-time.
      </p>

      <svg class="hidden lg:inline w-20 -rotate-180 absolute bottom-0 -left-6 fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 71 38">
        <g>
          <path d="M1.8 37.3a68.1 68.1 0 0 0 30.5-9.8A27 27 0 0 0 39 21c1.8 0 3.6-.1 5.4-.4 7.4-1.2 14.5-5 20.2-10a11138.4 11138.4 0 0 1-3 7.8 1.8 1.8 0 0 0 1.4 1.5 1.9 1.9 0 0 0 2.2-1.2l5-12.1a1.8 1.8 0 0 0-1.8-2.3L54 5.3c-2.4.1-2.4 3.7 0 3.6l7.9-.6a40.8 40.8 0 0 1-13.1 7.5c-2.5.8-5.1 1.4-7.7 1.6a17 17 0 0 0 1.1-4.4c.7-4.7-1.5-9.7-5.9-11.8-3.7-1.8-8-1.4-11.5.2-3.2 1.4-6 4.2-6.2 7.8-.3 4.7 4.7 7.7 8.4 9.3 2.5 1 5 1.8 7.7 2.2-2 2-4.1 3.8-6.6 5.2a69.2 69.2 0 0 1-26.3 7.8A1.8 1.8 0 0 0 0 35.5a1.8 1.8 0 0 0 1.8 1.8Zm23.1-24c-.7-.5-1.3-1-1.9-1.8l-.6-1c.1.2-.2-1-.2-.6a3.7 3.7 0 0 1 1.2-3.2c1-1 2.3-1.9 3.8-2.4 3.1-1.1 6.8-1 9.3 1.4l.5.5v.1h.1l.7 1.2.2.4a30.3 30.3 0 0 0 .6 1.9v.5l.1.5V13l-.2.6a13.3 13.3 0 0 1-.7 2.4l-.1.4-.6 1a25.8 25.8 0 0 1-12.1-4" />
        </g>
      </svg>
    </GridRow>

    <div class="flex gap-0 md:gap-4">
      <Frame class="relative flex-1"/>
      <Buttons/>
    </div>
  </div>
</template>

<style scoped lang="scss">
.demo {
  @apply my-24;

  .title {
    @apply mb-3 text-2xl font-bold;
  }

  .description {
    @apply text-gray-500 text-lg mb-6;
  }
}
</style>