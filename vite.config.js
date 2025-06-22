import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    //  server: {
    //     host: '0.0.0.0',
    //     port: 8080, // Optional: you can change this
    //       hmr: {
    //         protocol: 'wss',
    //         host: '07eb-152-32-112-24.ngrok-free.app', // 👈 your ngrok domain
    //         port: 443,
    //     },
    // },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
