import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/playVoice.js',
                'resources/js/sendWord.js',
                'resources/js/validation/lesson.js',
                'resources/js/validation/topic.js',
                'resources/js/student/toggleFrom.js'
            ],
            refresh: true,
        }),
    ],
});
