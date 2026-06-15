// vite.config.js
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/artwork.js",
                "resources/js/galleryHome.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: true,
        strictPort: true,
        hmr: {
            host: 'azart.test',
            protocol: 'ws',
            port: 5173
        }
    },
});
