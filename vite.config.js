import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/style.css', // Tambahkan ini
                'resources/js/app.js',
                'resources/js/ui-interact.js', // Tambahkan ini
            ],
            refresh: true,
        }),
    ],
});