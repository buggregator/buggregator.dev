<script setup lang="ts">
import type { WsEvent } from "~/config/types";

type Props = {
  name: string;
};
const props = defineProps<Props>();

const icon = () => {
  const list = [
    'love1.svg',
    'love2.svg',
    'pampers.svg',
    'poop1.svg',
    'poop2.svg',
    'toilet.svg',
  ]

  return list[Math.floor(Math.random() * list.length)];
};

const likes = ref([]);

const app = useNuxtApp();
const like = () => {
  app.$api.data.like(props.name);
};

app.$ws.channel('events').listen((data: WsEvent): void => {
  if (data.event === 'liked' && data.data.key === props.name) {
    likes.value.push(icon());

    setTimeout(() => {
      likes.value.shift();
    }, 3000);
  }
})
</script>

<template>
  <div class="cursor-pointer relative" @click="like">
    <span v-for="icon in likes" class="heart">
      <img class="w-16" :src="`/like/${icon}`" :alt="icon"/>
    </span>
    <slot></slot>
  </div>
</template>

<style scoped lang="scss">
@keyframes float {
  0% {
    opacity: 1;
    transform: rotateZ(0deg);
  }
  12% {
    transform: rotateZ(-20deg) scale(0.9);
  }
  24% {
    transform: rotateZ(20deg) scale(0.7);
    left: 3px;
    opacity: 0.7
  }
  40% {
    transform: rotateZ(-11deg) scale(0.6);
    left: -3px;
  }
  70% {
    transform: rotateZ(10deg) scale(0.4);
    left: 3px;
    opacity: .5;
  }
  90% {
    transform: scale(0.2);
    left: -3px;
  }
  100% {
    opacity: 0;
    top: -200px;
    transform: rotateZ(-5deg) scale(0.1);
  }
}

.heart {
  position: absolute;
  top: -60px;
  left: 0;
  animation: float 1.5s linear forwards;
}
</style>