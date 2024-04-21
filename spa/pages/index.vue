<template>
  <div>
    <Hero/>
    <Demo/>
    <Support/>
    <div class="flex flex-col gap-20">
      <HowToRun/>
      <Features/>
      <Trap/>
      <Team/>
      <Contribution/>
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
</script>
