export const useAppStore = defineStore('appStore', {
    state: () => ({
        stars: 1,
        buggregator_link: 'http://demo.buggregator.localhost'
    }),
    actions: {
        // async fetch(): Promise<void> {
        //     const result = await $fetch('https://api.nuxt.com/modules/pinia')
        //
        //     this.stars = result.stars
        // }
    }
})
