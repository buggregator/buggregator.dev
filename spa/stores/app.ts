import type { AppState, WsEvent } from "~/config/types";
import JSConfetti from "js-confetti";
import { WsClient } from "~/app/ws/client";

export const useAppStore = defineStore('appStore', {
    state: (): AppState => ({
        loading: true,
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
        async init(client: WsClient): void {
            this.loading = true

            await client.connect()

            this.loading = false
        },
        async fetch(): Promise<void> {
            const nuxt: NuxtApp = useNuxtApp()
            const result = await nuxt.$api.settings.get()
            this.github = result.github

            const config = useRuntimeConfig()
            this.buggregator_url = config.public.buggregator_url
        },

        subscribeToUpdates(): void {
            const nuxt: NuxtApp = useNuxtApp()

            const firework = (): void => {
                const jsConfetti = new JSConfetti();
                jsConfetti.addConfetti({
                    emojis: ['🦄', '⭐', '🎉', '💖', '🚀', '😍'],
                    emojiSize: 50,
                    confettiNumber: 40,
                });
            }

            nuxt.$ws.channel('events').listen((data: WsEvent): void => {
                switch (data.event) {
                    case 'repository.starred':
                        this.github[data.data.repository]['stars'] = data.data.stars

                        // todo: it should be in a different place
                        firework()
                        break
                }
            })
        }
    }
})
