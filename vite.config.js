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
        // Optimize build performance
        cssCodeSplit: true,
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
            },
        },
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
});
