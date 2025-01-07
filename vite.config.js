import { defineConfig } from 'vite';
import laravel, {refreshPaths} from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                ...refreshPaths,
                'app/Filament/Resources/**/*.php',
                'public/css/**/**/*.css',
                'public/js/**/**/*.js',
                'public/js/*.js'
            ]
        }),
    ],
});
