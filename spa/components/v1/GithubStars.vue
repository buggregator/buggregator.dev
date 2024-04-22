<script setup lang="ts">
import { useAppStore } from "~/stores/app";

type Props = {
  repository: number;
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
  return app.github[props.repository].stars;
});

const currentProgress = computed(() => {
  return (stars.value / props.required) * 100;
});
</script>

<template>
  <a class="stars-container" :class="size" :href="`https://github.com/buggregator/${repository}`" target="_blank">
    <div class="text">
      <img class="logo" src="~/assets/img/github.svg" alt="GitHub Logo"/> GitHub
    </div>
    <span class="stars">★ {{ stars }}</span>
  </a>

  <!--    <div v-if="progress" class="progress-bar">-->
  <!--      <div class="progress" :style="{ width: `${currentProgress}%` }"></div>-->
  <!--      <div class="required">of {{ props.required }} stars</div>-->
  <!--    </div>-->
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
    @apply gap-6 px-5 py-3 text-xl;

    .logo {
      @apply w-8 h-8;
    }

    .text {
      @apply gap-4;
    }
  }

  &.md {
    @apply gap-6 px-3 py-2;

    .logo {
      @apply w-6 h-6;
    }

    .text {
      @apply gap-2;
    }
  }

  &.sm {
    @apply gap-4 px-2 py-1 text-sm;

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
}
</style>