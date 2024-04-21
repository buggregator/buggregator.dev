export default defineNuxtConfig({
    runtimeConfig: {
        public: {
            api_url: process.env.API_URL || 'http://buggregator.localhost',
            ws_url: process.env.WS_URL || 'ws://buggregator.localhost/connection/websocket',
            examples_url: process.env.EXAMPLES_URL || 'http://buggregator.localhost',
            buggregator_url: process.env.BUGGREGATOR_URL || 'http://demo.buggregator.localhost',
        }
    },
    app: {
        head: {
            title: "Buggregator - The Ultimate Debugging Server for PHP",
            htmlAttrs: {
                lang: "en",
            },
            meta: [
                {charset: "utf-8"},
                {name: "viewport", content: "width=device-width, initial-scale=1"},
                {hid: "description", name: "description", content: "Buggregator is a free Swiss Army knife for developers. What makes it special is that it offers a range of features that you would usually find in various paid tools, but it's available for free."},
                {name: "format-detection", content: "telephone=no"},
            ],
            link: [
                {rel: "icon", type: "image/png", size: "16x16", href: "/favicon/favicon-16x16.png"},
                {rel: "icon", type: "image/png", size: "32x32", href: "/favicon/favicon-32x32.png"},
                {rel: "apple-touch-icon", sizes: "180x180", href: "/favicon/apple-touch-icon.png"},
                // {rel: "manifest", sizes: "180x180", href: "assets/site.webmanifest"},
            ],
        },
    },

    plugins: [
        'app/plugins/logger.ts',
        'app/plugins/centrifugo.ts',
        'app/plugins/apiClient.ts',
    ],

    ssr: false,

    router: {
        options: {
            hashMode: true
        }
    },

    css: [
        '~/assets/css/main.css'
    ],

    postcss: {
        plugins: {
            tailwindcss: {},
            autoprefixer: {},
        },
    },

    dir: {
        static: 'public',
    },

    typescript: {
        strict: true,
    },

    modules: [
        "@pinia/nuxt",
        'nuxt-anchorscroll',
    ],
})