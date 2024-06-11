<template>
  <div>
    <Hero/>
<!--    <HowItWorks/>-->
    <Frameworks/>
    <Demo/>
    <Support/>
    <div class="flex flex-col gap-20">
      <HowToRun/>
      <Trap class="-mt-20"/>
      <Features/>
      <Contribution/>
      <Team class="mb-20"/>
    </div>
    <PhpStorm/>
  </div>
</template>

<style scoped lang="scss">

</style>

<script setup lang="ts">
import Hero from "~/components/v1/Hero.vue"
import Demo from "~/components/v1/Demo.vue";
import Support from "~/components/v1/Support.vue";
import HowToRun from "~/components/v1/HowToRun.vue";
import Features from "~/components/v1/Features.vue";
import Trap from "~/components/v1/Trap.vue";
import Team from "~/components/v1/Team.vue";
import PhpStorm from "~/components/v1/PhpStorm.vue";
import Contribution from "~/components/v1/Contribution.vue";
import HowItWorks from "~/components/v1/HowItWorks.vue";
import Frameworks from "~/components/v1/Frameworks.vue";
import IntroVideo from "~/components/v1/IntroVideo.vue";
</script>
