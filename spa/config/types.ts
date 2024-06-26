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

export interface TeamMember {
    name: string;
    role: string;
    avatar: string;
    github: string;
}

export interface TeamState {
    team: TeamMember[];
    contributors: TeamMember[];
}

export interface TeamResponse {
    data: TeamMember[];
}

export interface Issue {
    repository: string;
    title: string;
    url: string;
    labels: string[];
    created_at: string;
}

export interface IssuesState {
    issues: Issue[];
}

export interface IssuesResponse {
    data: Issue[];
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