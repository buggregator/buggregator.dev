<template>
  <div class="navbar">
    <GridRow>
      <header class="navbar-header">
        <a href="/" class="logo">
          <img src="~/assets/img/logo.svg" alt="Buggregator Logo"/>
        </a>

        <div class="links">
          <a href="https://docs.buggregator.dev" target="_blank" class="link">
            Docs
          </a>

          <a href="https://github.com/buggregator/server" target="_blank" class="link">
            <img class="icon" src="~/assets/img/github.svg" alt="GitHub Logo"/>
          </a>

          <a href="https://discord.gg/4NFWBqMA8z" target="_blank" class="link">
            <img class="icon" src="~/assets/img/discord.svg" alt="Discord Logo"/>
          </a>
        </div>
      </header>
    </GridRow>
  </div>
</template>

<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
</script>

<style scoped lang="scss">
.navbar {
  @apply bg-gray-900 text-gray-300 h-52 py-8;
}

.navbar-header {
  @apply flex justify-between items-center;
}

.logo {
  img {
    @apply h-10 text-white fill-current;
  }
}

.links {
  @apply py-2 px-3 flex justify-end items-center gap-6;

  .link {
    @apply text-lg leading-none font-bold hover:text-gray-400;

    .icon {
      @apply w-6 h-6;
    }
  }
}
</style>