<script setup lang="ts">
import { useAppStore } from "~/stores/app";
import { GithubRepo } from "~/app/entity/GithubRepo";

const { gtag } = useGtag()

type Props = {
  repository: string;
  size: Enum<'sm' | 'md' | 'lg'>;
  progress: boolean;
  required: number;
};

const props = withDefaults(defineProps<Props>(), {
  size: 'md',
  required: 1000,
  progress: false,
});

const stars = computed(() => {
  const app = useAppStore();
  return app?.github[props.repository]?.stars || 0;
});

const repo = computed(() => {
  const app = useAppStore();
  return new GithubRepo(
    props.repository,
    app?.github[props.repository]?.stars || 0,
    app?.github[props.repository]?.latest_release
  );
});

const currentProgress = computed(() => {
  return (stars.value / props.required) * 100;
});

const onOnOpenLink = () => {
  gtag('event', 'open_github_stars', {
    category: 'engagement',
    label: 'github_stars',
    size: props.size,
    repository: props.repository,
  });
};
</script>

<template>
  <a class="stars-container"
     :class="size"
     :href="repo.url"
     target="_blank"
     @click="onOnOpenLink"
  >
    <div class="text">
      <img class="logo" src="~/assets/img/github.svg" alt="GitHub Logo"/> GitHub
    </div>
    <span v-if="repo.stars > 0" class="stars">★ {{ repo.stars }}</span>
    <span v-else class="no-stars">Star it now!</span>
  </a>

  <div v-if="progress" class="progress-bar">
    <div class="progress" :style="{ width: `${currentProgress}%` }"></div>
    <div class="required">of {{ props.required }} stars</div>
  </div>
</template>

<style scoped lang="scss">
.progress-bar {
  @apply h-6 rounded-full w-full overflow-hidden relative mt-6 border bg-gray-800 w-full md:w-2/3 lg:w-1/2 mx-auto;
  .progress {
    @apply bg-blue-600 h-full rounded-full;
  }

  .required {
    @apply text-white text-xs absolute bottom-0 right-0 px-2 h-full flex items-center;
  }
}

.stars-container {
  @apply bg-gray-800 text-white rounded-full flex items-center border bg-gray-800 hover:bg-blue-600 transition cursor-pointer;

  &.lg {
    @apply gap-6 p-4 text-xl pr-5;

    .logo {
      @apply w-8 h-8;
    }

    .text {
      @apply gap-4;
    }
  }

  &.md {
    @apply gap-6 py-2 pl-2 pr-3;

    .logo {
      @apply w-6 h-6;
    }

    .text {
      @apply gap-2;
    }
  }

  &.sm {
    @apply gap-4 p-1 text-sm;

    .logo {
      @apply w-5 h-5;
    }

    .text {
      @apply gap-2;
    }
  }

  .text {
    @apply flex items-center;
  }

  .stars {
    @apply break-keep text-nowrap;
  }

  .no-stars {
    @apply text-xs text-right -my-1 mr-1 text-yellow-300;
  }
}
</style>