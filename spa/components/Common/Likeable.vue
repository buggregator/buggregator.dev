<script setup lang="ts">
import type { WsEvent } from "~/config/types";
import JSConfetti from "js-confetti";

const { gtag } = useGtag()

type Props = {
  name: string;
};
const props = defineProps<Props>();

const icon = () => {
  const list = [
    '✌', '⭐', '❤️', '☢',
    '😊', '🔥', '☀️', '💀️',
    '⚡', '⏰', '🎈', '⛄',
    '🎉', '🎁', '🎊', '🎃',
    '🚀', '🍕', '🍔', '🍟',
    '🍦', '🏆', '🏈', '🏊',
    '🏄', '🏂', '🏇', '🚴',
  ]

  return list[Math.floor(Math.random() * list.length)];
};

const position = () => {
  const min = 10;
  const max = 80;

  return Math.floor(Math.random() * (max - min + 1)) + min;
}

const likes = ref([]);

const app = useNuxtApp();
const like = () => {
  app.$api.data.like(props.name);

  gtag('event', 'like', {
    label: 'like',
    name: props.name,
  });
};

const firework = (total: number = 40): void => {
  const jsConfetti = new JSConfetti();
  jsConfetti.addConfetti({
    emojis: ['🦄', '⭐', '🎉', '💖', '🚀', '😍'],
    emojiSize: 50,
    confettiNumber: total,
  });
}

app.$ws.channel('events').listen((data: WsEvent): void => {
  if (data.event === 'liked' && data.data.key === props.name) {
    likes.value.push({ icon: icon(), position: position() });

    if (likes.value.length > 10) {
      firework(10);
    }

    setTimeout(() => {
      likes.value.shift();
    }, 3000);
  }
})
</script>

<template>
  <div class="cursor-pointer relative" @click="like">
    <span v-for="{icon, position} in likes"
          class="icon"
          :style="{left: `${position}px`}"
    >
     {{ icon }}
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
    margin-left: 10px;
    opacity: 0.7
  }
  40% {
    transform: rotateZ(-11deg) scale(0.6);
    margin-right: 10px;
  }
  70% {
    transform: rotateZ(10deg) scale(0.4);
    margin-left: 10px;
    opacity: .5;
  }
  90% {
    transform: scale(0.2);
    margin-right: 10px;
  }
  100% {
    opacity: 0;
    top: -300px;
    transform: rotateZ(-5deg) scale(0.1);
  }
}

.icon {
  @apply absolute text-5xl;
  top: -60px;
  animation: float 1.5s linear forwards;
}
</style>