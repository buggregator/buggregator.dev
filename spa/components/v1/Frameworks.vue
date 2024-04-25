<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import CopyCommand from "~/components/v1/CopyCommand.vue";
import GithubStars from "~/components/v1/GithubStars.vue";
</script>

<template>
  <div class="pt-16 pb-10 text-center">
    <GridRow>
      <p class="text-lg mb-6 font-medium text-gray-500">
        It can be used with your favorite PHP Framework or CMS
      </p>

      <div class="flex flex-wrap items-center justify-center gap-10">
<!--        <a href="https://spiral.dev/" target="_blank">-->
          <img class="h-10 md:h-12" src="~/assets/img/spiral.svg" alt="Spiral Framework"/>
<!--        </a>-->
<!--        <a href="https://www.yiiframework.com/" target="_blank">-->
          <img class="h-6 md:h-8" src="~/assets/img/yii3.svg" alt="Yii 3 Framework"/>
<!--        </a>-->
<!--        <a href="https://symfony.com/" target="_blank">-->
          <img class="h-5 md:h-7" src="~/assets/img/symfony.svg" alt="Symfony Framework"/>
<!--        </a>-->
<!--        <a href="https://laravel.com/" target="_blank">-->
          <img class="h-5 md:h-7" src="~/assets/img/laravel.svg" alt="Laravel Framework"/>
<!--        </a>-->
<!--        <a href="https://wordpress.com/" target="_blank">-->
          <img class="h-5 md:h-7" src="~/assets/img/wordpress.svg" alt="Wordpress"/>
<!--        </a>-->
<!--        <a href="https://www.drupal.org/" target="_blank">-->
          <img class="h-4 md:h-6" src="~/assets/img/drupal.svg" alt="Drupal"/>
<!--        </a>-->
      </div>

    </GridRow>
  </div>
</template>

<style scoped lang="scss">

</style>