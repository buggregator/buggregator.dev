import { white } from 'console-log-colors'

const colorMapper = (service: string) => {
    switch (service.toLowerCase()) {
        case 'rpc':
            return white.bgGreen.bold
        case 'api':
            return white.bgBlue.bold
        case 'ws':
            return white.bgMagenta.bold
        case 'store':
            return white.bgRed.bold
    }

    return white.bgBlack.bold
}

export class Logger {
    private readonly mode: string
    private readonly prefix: string
    private readonly mapper;

    constructor(mode: string, prefix: string = '') {
        this.mode = mode
        this.prefix = prefix
        this.mapper = colorMapper(prefix)
    }

    withPrefix(prefix: string): Logger {
        return new Logger(this.mode, prefix)
    }

    debug(...content): void {
        this.__log('debug', ...content)
    }

    error(...content): void {
        this.__log('error', ...content)
    }

    info(...content): void {
        this.__log('info', ...content)
    }

    success(...content): void {
        this.__log('success', ...content)
    }

    __log(type: string, ...content): void {
        if (this.mode !== 'development') {
            return
        }

        if (this.prefix) {
            content.unshift(this.mapper(`[${this.prefix}]`))
        }

        switch (type) {
            case 'debug':
                console.info(...content)
                break
            case 'success':
                console.info(...content)
                break
            case 'info':
                console.info(...content)
                break
            case 'error':
                console.error(...content)
                break
        }
    }
}
