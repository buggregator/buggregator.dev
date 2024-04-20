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
  <div class="mb-10 flex">
    <code class="code" @click="copyToClipboard">{{ text }}</code>
  </div>
</template>

<style scoped lang="scss">
.code {
  @apply overflow-hidden select-all cursor-pointer w-auto bg-gray-50 text-gray-800 font-semibold hover:text-gray-700 font-mono px-3 py-2 border border-gray-200 hover:border-blue-600 rounded-full transition-colors duration-200 text-nowrap break-keep;
}
</style>