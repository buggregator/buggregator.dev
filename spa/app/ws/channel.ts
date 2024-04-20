import {WsClient} from "~/app/ws/client";
import {PublicationContext, Subscription} from "centrifuge";

type Listeners = Function[];

export default class Channel {
    /** The name of the channel. */
    readonly name: string;
    /** The event callbacks applied to the socket. */
    private event: Function | null = null;
    /** User supplied callbacks for events on this channel. */
    private listeners: Listeners = [];
    private readonly ws: WsClient;
    private subscription: Subscription | null = null;

    /**
     * Create a new class instance.
     */
    constructor(ws: WsClient, name: string) {
        this.ws = ws
        this.name = name
        this._subscribe()
    }

    /**
     * Listen for an event on the channel instance.
     */
    listen(callback: Function): Channel {
        this._on(callback)
        return this
    }

    /**
     * Bind the channel's socket to an event and store the callback.
     */
    private _on(callback: Function): Channel {
        if (!callback) {
            throw new Error('Callback should be specified.');
        }

        if (!this.event) {
            this.event = (context: PublicationContext): void => {
                this.listeners.forEach(cb => cb(context, context.data))
            }
            this.subscription!.on('publication', this.event)
        }

        this.listeners.push((context: any, data: any): void => {
            this.ws.logger.debug(`Event [${context.channel}] received`, context)
            callback(data)
        })

        return this
    }

    unsubscribe(): void {
        this.subscription!.removeAllListeners()
        this.ws.centrifuge.removeSubscription(this.subscription)
        this.listeners = []
        this.event = null
    }

    _subscribe(): void {
        let sub: Subscription | null = this.ws.centrifuge.getSubscription(this.name)

        if (!sub) {
            sub = this.ws.centrifuge.newSubscription(this.name)
            sub.on('subscribing', (context) => {
                this.ws.logger.debug(`Subscribing to [${this.name}]`, context)
            })
            sub.on('subscribed', (context) => {
                this.ws.logger.debug(`Subscribed to [${this.name}]`, context)
            })
            sub.on('unsubscribed', (context) => {
                this.ws.logger.debug(`Unsubscribed from [${this.name}]`, context)
            })
            sub.subscribe()
        }

        this.subscription = sub
    }
}