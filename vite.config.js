import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    //     server: {
    //     host: '0.0.0.0', // ← allows access from other devices in LAN
    //     port: 5173,      // optional: keep consistent
    //     hmr: {
    //         host: 'YOUR_LOCAL_IP', // e.g. '192.168.1.10'
    //     },
    // },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
