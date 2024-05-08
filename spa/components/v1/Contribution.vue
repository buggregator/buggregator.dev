<script setup lang="ts">
import { useIssuesStore } from "~/stores/issues";
import GridRow from "~/components/v1/GridRow.vue";

const { gtag } = useGtag()

const store = useIssuesStore();
store.fetch();

const issues = computed(() => {
  return store.issues;
});

const redirectTo = (url: string) => {
  gtag('event', 'open_issue', {
    label: 'open_issue',
    url,
  });
  window.open(url, "_blank");
};
</script>

<template>
  <div class="bg-white py-16" id="contributing">
    <GridRow>
      <h3 class="section-title text-blue-800">Contributing</h3>

      <p class="section-body text-gray-500">
        In our repositories, we categorize issues that are open for community contribution using the for
        contributors label. This makes it easier for you to find ways to participate.
      </p>

      <a href="https://docs.buggregator.dev/contributing.html" target="_blank" class="read-more-link blue">
        Read more
      </a>

      <p class="section-body text-gray-500 mt-12">
        Here are some issues that are open for contribution:
      </p>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        <article v-for="issue in issues"
                 class="p-5 border rounded-xl hover:bg-gray-50 hover:shadow-xl cursor-pointer"
                 @click="redirectTo(issue.url)"
        >
          <h3
            class="mb-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600 flex gap-4 items-start">
            {{ issue.title }}
          </h3>
          <div class="flex items-center flex-wrap gap-1 text-xs">
            <span v-for="label in issue.labels" class="rounded-full bg-blue-50 px-2 py-1 text-blue-600">
              {{ label }}
            </span>
            <span class="rounded-full bg-gray-50 px-2 py-1 text-gray-800 hover:bg-gray-100 cursor-pointer">
              {{ issue.repository }}
            </span>
          </div>
        </article>
      </div>

    </GridRow>
  </div>
</template>