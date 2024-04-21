import type { TeamState } from "~/config/types";

export const useTeamStore = defineStore('teamStore', {
    state: (): TeamState => ({
        team: [],
        contributors: []
    }),
    actions: {
        async fetch(): Promise<void> {
            const nuxt: NuxtApp = useNuxtApp()
            this.team = await nuxt.$api.team.list()
        }
    }
})
