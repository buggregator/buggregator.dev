<script setup lang="ts">
import Feature from "~/components/v1/Features/Feature.vue";
</script>

<template>
  <Feature class="bg-[url('~/assets/img/bg.jpg')]">
    <div>
      <h3 class="text-2xl font-bold text-white">Seamless Integration</h3>

      <p class="text-gray-100 my-4 text-lg">
        Easily integrate Buggregator with the libraries you already use, like Ray and Symfony/VarDumper, without any
        additional installations. Just configure your server address, and you're ready to go. Our aim is to offer a
        server that aggregates data from your preferred libraries conveniently in one place.
      </p>
    </div>
    <div>
      <img src="~/assets/img/clients.png" alt="Icons"/>
    </div>
  </Feature>
</template>