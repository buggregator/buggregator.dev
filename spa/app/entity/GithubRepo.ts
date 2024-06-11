import moment from 'moment';

export class GithubRepo {
    constructor(
        public name: string,
        public stars: number,
        private latest_release: {
            repository: string,
            version: string,
            createdAt: string
        }
    ) {
    }

    get url(): string {
        return `https://github.com/${this.latest_release.repository}`
    }

    get version(): string {
        return this.latest_release.version
    }

    get starsFormatted(): string {
        return this.stars.toLocaleString()
    }

    get createdAt(): string {
        return moment(this.latest_release.createdAt).fromNow()
    }

    get isNew(): boolean {
        return moment(this.latest_release.createdAt).isAfter(moment().subtract(1, 'week'))
    }
}