<script setup lang="ts">
import GridRow from "~/components/v1/GridRow.vue";
import SeamlessIntegration from "~/components/v1/Features/SeamlessIntegration.vue";
import SSO from "~/components/v1/Features/SSO.vue";
import ExternalDatabases from "~/components/v1/Features/ExternalDatabases.vue";
import KubernetesReady from "~/components/v1/Features/KubernetesReady.vue";
import SourceCode from "~/components/v1/Features/SourceCode.vue";
</script>

<template>
  <GridRow class="features">
    <h3 class="section-title">
      Features
    </h3>

    <div class="flex flex-col gap-6">
      <SeamlessIntegration/>
      <div class="flex gap-6">
        <SSO class="w-1/2 bg-white"/>
        <ExternalDatabases class="w-1/2 bg-white"/>
      </div>
      <KubernetesReady/>
      <SourceCode/>`
    </div>
  </GridRow>
</template>

<style scoped lang="scss">
.section-title {
  @apply text-blue-800;
}
</style>