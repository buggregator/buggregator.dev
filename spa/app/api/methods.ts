import {
    SettingsResponse,
    TeamResponse,
    ServerResponse, IssuesResponse
} from "~/config/types";
import { RPCClient } from "~/app/ws/RPCClient";

const settings = (rpc: RPCClient) => () => rpc.call('get:api/settings')
    .then((response: ServerResponse<SettingsResponse>) => response.data);

const team = (rpc: RPCClient) => () => rpc.call('get:api/team')
    .then((response: ServerResponse<TeamResponse>) => response.data.data);

const issuesForContributors = (rpc: RPCClient) => () => rpc.call('get:api/issues/for-contributors')
    .then((response: ServerResponse<IssuesResponse>) => response.data.data);

const like = (rpc: RPCClient) => (key: string) => rpc.call('post:api/like', {key});

const callExampleAction = (host: string) => (action: string) => {
    action = action.toLowerCase();

    const path: string = action === 'profiler:report' ? 'example/call/profiler' : 'example/call';

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
    team,
    callExampleAction,
    issuesForContributors,
    like
}
