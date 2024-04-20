import {
    SettingsResponse,
    ServerResponse
} from "~/config/types";
import { RPCClient } from "~/app/ws/RPCClient";

const settings = (rpc: RPCClient) => () => rpc.call('get:api/settings')
    .then((response: ServerResponse<SettingsResponse>) => response.data);

const callExampleAction = (host: string) => (action: string) => {
    action = action.toLowerCase();

    const path: string = action === 'profiler:report' ? '_profiler' : '';

    return useFetch(`${host}/${path}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({action})
    })
}

export default {
    settings,
    callExampleAction
}
