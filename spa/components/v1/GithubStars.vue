<script setup lang="ts">
import { useAppStore } from "~/stores/app";
import AnimatedCounter from 'vue-animated-counter';

type Props = {
  repository: number;
  size: Enum<'sm' | 'md' | 'lg'>;
};

const props = withDefaults(defineProps<Props>(), {
  size: 'md',
});


const stars = computed(() => {
  const app = useAppStore();
  return app.github[props.repository].stars;
}, {
  onTrigger(e) {
    if (e.key === 'stars') {
      console.log('Stars updated');
    }
  }
});
</script>

<template>
  <a class="stars-container" :class="size" :href="`https://github.com/buggregator/${repository}`" target="_blank">
    <div class="text">
      <img class="logo" src="~/assets/img/github.svg" alt="GitHub Logo"/> GitHub
    </div>
    <span class="stars">★ {{ stars }}</span>
  </a>
</template>

<style scoped lang="scss">
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