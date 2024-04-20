<script setup lang="ts">
import Feature from "~/components/v1/Features/Feature.vue";
</script>

<template>
  <Feature>
    <div class="feature-grid">
      <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-8 text-purple-400">
        <path fill="currentColor"
              d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z"
              data-v-d08416bc="" class=""></path>
      </svg>
      <div>
        <h3 class="feature-title">Single Sign On</h3>
        <p class="feature-text">Securely manage user access and authentication through Single
          Sign-On (SSO) with providers like <a href="https://auth0.com/" class="text-link">Auth0</a>.
        </p>
      </div>
    </div>
    <div>
      <a href="https://docs.buggregator.dev/config/sso.html" target="_blank" class="read-more-link purple">
        Read more
      </a>
    </div>
  </Feature>
</template>

<style scoped lang="scss">

</style>