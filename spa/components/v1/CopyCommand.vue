<script setup lang="ts">
import copy from 'copy-to-clipboard';

const props = defineProps<{
  text: string;
}>();

const copyToClipboard = () => {
  copy(props.text);
};
</script>

<template>
  <div class="mb-10 flex code">
    <code class="px-3" @click="copyToClipboard">{{ text }}</code>
    <svg viewBox="0 0 24 24" class="text-gray-300 w-5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 8V7c0-1 0-1.4.3-1.7.3-.3.8-.3 1.7-.3h5c1 0 1.4 0 1.7.3.3.3.3.8.3 1.7v5c0 1 0 1.4-.3 1.7-.3.3-.8.3-1.7.3h-1m-9 5h5c1 0 1.4 0 1.7-.3.3-.3.3-.8.3-1.7v-5c0-1 0-1.4-.3-1.7-.3-.3-.8-.3-1.7-.3H7c-1 0-1.4 0-1.7.3-.3.3-.3.8-.3 1.7v5c0 1 0 1.4.3 1.7.3.3.8.3 1.7.3Z" stroke="#464455" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
</template>

<style scoped lang="scss">
.code {
  @apply overflow-hidden select-all cursor-pointer w-auto bg-gray-50 text-gray-800 font-semibold hover:text-gray-700 font-mono px-3 py-2 border border-gray-200 hover:border-blue-600 rounded-full transition-colors duration-200 text-nowrap break-keep;
}
</style>