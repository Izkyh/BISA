import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    build: {
        cssCodeSplit: true,
        minify: 'esbuild',
        sourcemap: false,
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor': ['bootstrap'],
                },
            },
        },
    },
    css: {
        devSourcemap: false,
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler',
                quietDeps: true,
                silenceDeprecations: [
                    'legacy-js-api',
                    'import',
                    'global-builtin',
                    'color-functions'
                ]
            }
        }
    },
    // Enable faster HMR
    server: {
        hmr: {
            overlay: false,
        },
        watch: {
            usePolling: false,
        },
    },
    esbuild: {
        drop: ['console', 'debugger'],
    },
});
