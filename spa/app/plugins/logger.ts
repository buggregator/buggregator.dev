import { Logger } from "~/app/logger";

export default defineNuxtPlugin(() => {
    return {
        provide: {
            logger: new Logger(process.env.NODE_ENV!).withPrefix('APP'),
        }
    }
})
