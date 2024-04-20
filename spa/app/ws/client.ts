import { Centrifuge } from "centrifuge";
import Channel from './channel'
import { Logger } from "~/app/logger";

type Channels = {
    [key: string]: Channel
}

export class WsClient {
    channels: Channels = {}
    readonly centrifuge: Centrifuge
    readonly logger: Logger

    constructor(centrifuge: Centrifuge, logger: Logger) {
        this.centrifuge = centrifuge
        this.logger = logger.withPrefix('ws')
    }

    rpc(method: string, data: object = {}) {
        return this.centrifuge.rpc(method, data)
    }

    connect() {
        this.centrifuge.on('connecting', (context) => {
            this.logger.debug('Connecting', context)
        })
        this.centrifuge.on('connected', (context) => {
            this.logger.debug('Connected', context)
        })
        this.centrifuge.on('disconnected', (context) => {
            this.logger.debug('Disconnected', context)
        })

        this.centrifuge.connect()

        return this.centrifuge.ready()
    }

    disconnect(): void {
        this.disconnectChannels()
        this.centrifuge.removeAllListeners()
        this.centrifuge.disconnect()
    }

    disconnectChannels(): void {
        Object.entries(this.channels).forEach(([key, channel]): void => {
            channel.unsubscribe()
        })
    }

    channel(channel: string): Channel {
        if (!this.channels[channel]) {
            this.channels[channel] = new Channel(this, channel);
        }

        return this.channels[channel];
    }
}
