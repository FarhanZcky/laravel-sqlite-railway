import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        {
            name: 'move-manifest',
            closeBundle() {
                const viteManifest = path.resolve(__dirname, 'public/build/.vite/manifest.json');
                const targetManifest = path.resolve(__dirname, 'public/build/manifest.json');
                if (fs.existsSync(viteManifest)) {
                    fs.renameSync(viteManifest, targetManifest);
                }
            }
        }
    ],
    build: {
        manifest: true,
        outDir: 'public/build',
        emptyOutDir: true,
    },
});
