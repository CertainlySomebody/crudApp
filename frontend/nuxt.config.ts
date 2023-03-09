// https://nuxt.com/docs/api/configuration/nuxt-config
import { resolve } from "path";
export default defineNuxtConfig({
    alias: {
        '@': resolve(__dirname, "/"),
    },
    modules: [
        'nuxt-windicss',
        '@formkit/nuxt',
    ],
    css: ["~/assets/main.css"],
    ssr: false,
})
