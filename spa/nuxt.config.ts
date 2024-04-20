export default defineNuxtConfig({
    runtimeConfig: {
        public: {
            api_url: process.env.API_URL || 'http://api.buggregator.localhost',
            ws_url: 'ws://ws.buggregator.localhost/connection/websocket',
            examples_url: 'http://examples.buggregator.localhost',
        }
    },
    app: {
        head: {
            title: "Buggregator",
            htmlAttrs: {
                lang: "en",
            },
            meta: [
                {charset: "utf-8"},
                {name: "viewport", content: "width=device-width, initial-scale=1"},
                {hid: "description", name: "description", content: "The Ultimate Debugging Server for PHP"},
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

    devtools: {
        enabled: true
    },

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
        static: 'static',
    },

    typescript: {
        strict: true,
    },

    modules: [
        "@pinia/nuxt",
        'nuxt-anchorscroll',
    ],

    anchorscroll: {
        hooks: [
            // Or any valid hook if needed
            // Default is `page:finish`
            'page:transition:finish',
        ],
    },
})