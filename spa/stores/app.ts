import type { AppState, WsEvent } from "~/config/types";

export const useAppStore = defineStore('appStore', {
    state: (): AppState => ({
        github: {
            server: {
                stars: 0,
                last_version: ''
            },
            trap: {
                stars: 0,
                last_version: ''
            }
        },
        buggregator_url: ''
    }),
    actions: {
        async fetch(): Promise<void> {
            const nuxt: NuxtApp = useNuxtApp()
            const result = await nuxt.$api.settings.get()
            this.github = result.github

            const config = useRuntimeConfig()
            this.buggregator_url = config.public.buggregator_url
        },

        subscribeToUpdates(): void {
            const nuxt: NuxtApp = useNuxtApp()
            nuxt.$ws.channel('events').listen((data: WsEvent): void => {
                switch (data.event) {
                    case 'repository.starred':
                        this.github[data.data.repository]['stars'] = data.data.stars
                        break
                }
            })
        }
    }
})
