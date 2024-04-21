import type { IssuesState } from "~/config/types";

export const useIssuesStore = defineStore('issuesStore', {
    state: (): IssuesState => ({
        issues: [],
    }),
    actions: {
        async fetch(): Promise<void> {
            const nuxt: NuxtApp = useNuxtApp()
            this.issues = await nuxt.$api.issue.list()
        }
    }
})
