import Api from "~/app/api/Api";
import { WsClient } from "~/app/ws/client";
import { RPCClient } from "~/app/ws/RPCClient";
import { Logger } from "~/app/logger";

export default defineNuxtPlugin(({$ws, $logger}: { $ws: WsClient, $logger: Logger }) => {
    const rpc: RPCClient = new RPCClient($ws, $logger)

    const config = useRuntimeConfig()
    const examples_url: string = config.public.examples_url
    const api_url: string = config.public.rest_api_url

    return {
        provide: {
            api: new Api(rpc, api_url, examples_url)
        }
    }
})
