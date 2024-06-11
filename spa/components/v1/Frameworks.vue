<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import Likeable from "~/components/Common/Likeable.vue";
</script>

<template>
  <div class="pt-16 pb-10 text-center select-none">
    <GridRow>
      <p class="text-lg mb-6 font-medium text-gray-500">
        It can be used with any your favorite PHP Framework or CMS. Here are some of the most popular ones.
      </p>

      <div class="flex flex-wrap items-center justify-center gap-10">
        <Likeable name="spiral">
          <img class="h-10 md:h-12" src="~/assets/img/spiral.svg" alt="Spiral Framework"/>
        </Likeable>
        <Likeable name="yii">
          <img class="h-6 md:h-8" src="~/assets/img/yii3.svg" alt="Yii 3 Framework"/>
        </Likeable>
        <Likeable name="symfony">
          <img class="h-5 md:h-7" src="~/assets/img/symfony.svg" alt="Symfony Framework"/>
        </Likeable>
        <Likeable name="laravel">
          <img class="h-5 md:h-7" src="~/assets/img/laravel.svg" alt="Laravel Framework"/>
        </Likeable>
        <Likeable name="wordpress">
          <img class="h-5 md:h-7" src="~/assets/img/wordpress.svg" alt="Wordpress"/>
        </Likeable>
        <Likeable name="drupal">
          <img class="h-4 md:h-6" src="~/assets/img/drupal.svg" alt="Drupal"/>
        </Likeable>
      </div>

    </GridRow>
  </div>
</template>

<style scoped lang="scss">

</style>