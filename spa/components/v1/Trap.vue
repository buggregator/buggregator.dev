<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import CopyCommand from "~/components/v1/CopyCommand.vue";
import GithubStars from "~/components/v1/GithubStars.vue";
import { useAppStore } from "~/stores/app";
import { GithubRepo } from "~/app/entity/GithubRepo";

const { gtag } = useGtag()

const onOpenRepo = () => {
  gtag('event', 'open_repo', {
    label: 'open_repo',
    component: 'trap',
  });
};

const trapRepo = computed(() => {
  const app = useAppStore();
  return new GithubRepo(
    'trap',
    app?.github['trap']?.stars || 0,
    app?.github['trap']?.latest_release
  );
});
</script>

<template>
  <div class="bg-white py-16 section-trap">
    <GridRow>

      <h3 class="section-title text-blue-800">We also have Trap!</h3>

      <p class="section-body text-gray-500">
        Trap is a lightweight version of Buggregator designed to be installed directly to PHP
        applications via composer package. It supports almost all server version features.
      </p>

      <div class="mb-10 flex">
        <CopyCommand text="composer require --dev buggregator/trap -W"/>
      </div>

      <div class="flex gap-6">
        <a href="https://docs.buggregator.dev/trap/what-is-trap.html" target="_blank" class="read-more-link blue"
           @click="onOpenRepo">
          Read more
        </a>
        <GithubStars repository="trap"/>

        <a v-if="trapRepo.isNew" :href="`${trapRepo.url}/releases/tag/${trapRepo.version}`"
           target="_blank"
           class="text-base font-semibold align-super bg-orange-400 text-black rounded-full px-4 py-1 tracking-wide flex items-center"
        >
          New release v{{ trapRepo.version }} is out!
        </a>
      </div>

    </GridRow>
  </div>
</template>

<style scoped lang="scss">
.section-trap {
  @apply relative;
  &:before {
    position: absolute;
    content: '';
    pointer-events: none;

    top: -1px;
    border: 0 !important;
    background-image: linear-gradient(135deg, #111827 25%, transparent 25%), linear-gradient(225deg, #111827 25%, transparent 25%);
    background-position: 50%;

    right: 0;
    left: 0;
    z-index: 10;
    height: 50px;
    background-size: 50px 100%;
  }
}
</style>