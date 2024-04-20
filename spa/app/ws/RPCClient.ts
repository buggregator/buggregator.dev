import {WsClient} from "~/app/ws/client";
import {Logger} from "~/app/logger";

export class RPCClient {
    private ws: WsClient;
    readonly logger: Logger;

    constructor(ws: WsClient, logger: Logger) {
        this.ws = ws;
        this.logger = logger.withPrefix('rpc');
    }

    async call(method: string, data: object = {}) {
        this.logger.debug(`Request [${method}]`, data);

        return await this.ws.rpc(method, data)
            .then(result => {
                this.logger.debug(`Response [${method}]`, result);

                if (result.data.code !== 200) {
                    this.logger.error(`Error [${method}]`, result.data);

                    throw new Error(`Something went wrong [${method}]. Error: ${result.data.message}`);
                }

                return result;
            })
    }
}
