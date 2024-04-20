export default defineNuxtConfig({
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
                {rel: "manifest", sizes: "180x180", href: "site.webmanifest"},
            ],
        },
    },

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

    modules: ["@pinia/nuxt"]
})