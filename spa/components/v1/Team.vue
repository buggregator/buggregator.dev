<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import { useTeamStore } from "~/stores/team";

const store = useTeamStore();

await store.fetch();
const users = computed(() => {
  return store.team;
});
</script>

<template>
  <GridRow>
    <h2 class="section-title">We are Buggregator developers</h2>

    <div class="users">
      <a v-for="user in users" :href="user.github" target="_blank" class="user">
        <div class="avatar">
          <img :src="user.avatar" alt="avatar" loading="lazy">
        </div>
        <div class="full-name">{{ user.name }}</div>
        <div class="role">{{ user.role }}</div>
      </a>
    </div>
  </GridRow>
</template>

<style scoped lang="scss">
.users {
  @apply flex flex-wrap gap-5 justify-center;
}

.user {
  @apply flex flex-col items-center justify-start;

  .avatar {
    @apply p-1 border-2 border-blue-400 rounded-full;

    img {
      @apply w-16 h-16 rounded-full bg-blue-200;
    }
  }

  .full-name {
    @apply text-gray-900 text-xl font-medium;
  }

  .role {
    @apply text-blue-600 text-sm font-bold;
  }
}
</style>