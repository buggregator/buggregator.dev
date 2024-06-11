<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import CopyCommand from "~/components/v1/CopyCommand.vue";
import { useAppStore } from "~/stores/app";
import { GithubRepo } from "~/app/entity/GithubRepo";

const { gtag } = useGtag()

const copyToClipboard = () => {
  gtag('event', 'copy_command', {
    label: 'copy_command',
    component: 'how_to_run',
  });
};

const openDocs = () => {
  gtag('event', 'open_docs', {
    label: 'open_docs',
    component: 'how_to_run',
  });
};

const serverRepo = computed(() => {
  const app = useAppStore();
  return new GithubRepo(
    'server',
    app?.github['server']?.stars || 0,
    app?.github['server']?.latest_release
  );
});
</script>

<template>
  <div class="block-wrapper" id="install">
    <GridRow>
      <h3 class="section-title">
        How to run?
      </h3>

      <p class="section-body">
        Getting Buggregator up and running is super simple! Just make sure Docker is installed on your server. Then, run
        this command in your terminal:
      </p>

      <div class="flex">
        <CopyCommand
          text="docker run -p 8000:8000 -p 1025:1025 -p 9912:9912 -p 9913:9913 ghcr.io/buggregator/server:latest"
          @click="copyToClipboard"
        />
      </div>

      <div class="flex gap-6">
        <a href="https://docs.buggregator.dev/getting-started.html" target="_blank" class="read-more-link gray"
           @clic="openDocs">
          Read more
        </a>

        <a v-if="serverRepo.isNew" :href="`${serverRepo.url}/releases/tag/${serverRepo.version}`"
           target="_blank"
           class="text-base font-semibold align-super bg-orange-400 text-black rounded-full px-4 py-1 tracking-wide flex items-center"
        >
          New release v{{ serverRepo.version }} is out!
        </a>
      </div>
    </GridRow>
  </div>
</template>

<style scoped lang="scss">
.block-wrapper {
  @apply bg-gray-900 py-20 mt-24;

  .section-title {
    @apply text-yellow-200;
  }

  .section-subtitle {
    @apply text-yellow-200 text-4xl mb-12;
  }

  .section-body {
    @apply text-gray-200;
  }
}
</style>