import { WsClient } from "~/app/ws/client";
import { Centrifuge } from "centrifuge";
import { useAppStore } from "~/stores/app";

const guessWsConnection = (): string => {
    const WS_HOST: string = window.location.host
    const WS_PROTOCOL: string = window.location.protocol === 'https:' ? 'wss' : 'ws'

    return `${WS_PROTOCOL}://${WS_HOST}/connection/websocket`;
}

export default defineNuxtPlugin(async (nuxtApp) => {
    const config = useRuntimeConfig()
    const ws_url: string = (config.public.ws_url) || guessWsConnection()
    const store = useAppStore();

    const client: WsClient = new WsClient(
        new Centrifuge(ws_url),
        nuxtApp.$logger
    )

    await store.init(client)

    nuxtApp.hook('app:created', (): void => {
        const settings = useAppStore()
        settings.fetch()

        settings.subscribeToUpdates()
    })

    return {
        provide: {
            ws: client
        }
    }
})
