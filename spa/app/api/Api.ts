import apiMethods from '~/app/api/methods';
import { RPCClient } from "~/app/ws/RPCClient";
import { Issue, SettingsResponse, TeamMember } from "~/config/types";

type SettingsApi = {
    get: () => SettingsResponse,
}

type ExamplesApi = {
    call: (action: string) => void,
}

type TeamApi = {
    list: () => TeamMember[],
}

type IssueApi = {
    list: () => Issue[],
}

export default class Api {
    private readonly rpc: RPCClient;
    private readonly _api_url: string;
    private readonly _examples_url: string;

    constructor(rpc: RPCClient, api_url: string, examples_url: string) {
        this.rpc = rpc;
        this._api_url = api_url;
        this._examples_url = examples_url;
    }

    get settings(): SettingsApi {
        return {
            get: apiMethods.settings(this.rpc),
        }
    }

    get team(): TeamApi {
        return {
            list: apiMethods.team(this.rpc),
        }
    }

    get issue(): IssueApi {
        return {
            list: apiMethods.issuesForContributors(this.rpc),
        }
    }

    get examples(): ExamplesApi {
        return {
            call: apiMethods.callExampleAction(this._examples_url),
        }
    }
}
