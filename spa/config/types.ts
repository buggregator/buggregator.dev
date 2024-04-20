export interface SettingsResponse {
    github: {
        server: {
            stars: number;
            last_version: string;
        },
        trap: {
            stars: number;
            last_version: string;
        }
    }
}

export interface ServerResponse<T> {
    data: T;
    response: {
        body: {};
        headers: {};
        status: number;
        statusText: string;
        url: string,
        type: string
    };
}

export interface AppState {
    github: {
        server: {
            stars: number;
            last_version: string;
        },
        trap: {
            stars: number;
            last_version: string;
        }
    },
    buggregator_link: string;
}

export interface WsEvent {
    event: string;
    data: any;
}