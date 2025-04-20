import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
// import inertia from './resources/scripts/vite/inertia-layout';
import path from 'path';

export default defineConfig({
    // plugins: [
        // laravel({
        //     input: ['resources/css/app.css', 'resources/js/app.js'],
        //     refresh: true,
        // }),
    // ],
    // plugins: [
    //     // laravel(['resources/js/app.js']),
    //     laravel({
    //         input: ['resources/css/app.css', 'resources/js/app.js'],
    //         refresh: true,
    //     }),
    //     vue({
    //         template: {
    //             transformAssetUrls: {
    //                 // The Vue plugin will re-write asset URLs, when referenced
    //                 // in Single File Components, to point to the Laravel web
    //                 // server. Setting this to `null` allows the Laravel plugin
    //                 // to instead re-write asset URLs to point to the Vite
    //                 // server instead.
    //                 base: null,
 
    //                 // The Vue plugin will parse absolute URLs and treat them
    //                 // as absolute paths to files on disk. Setting this to
    //                 // `false` will leave absolute URLs un-touched so they can
    //                 // reference assets in the public directory as expected.
    //                 includeAbsolute: false,
    //             },
    //         },
    //     }),
    // ],
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        // inertia(),
        vue(),
    ],
    resolve: {
        alias: {
            '@': '/resources/ts',
            ziggy: path.resolve('vendor/tightenco/ziggy/dist'),
        },
    },
    server: {
        host: '127.0.0.1', // 👈 This fixes the [::1] issue
        port: 8001,
    },
});


// import { defineConfig } from 'vite'
// import vue from '@vitejs/plugin-vue'
// import path from 'path'

// export default defineConfig({
//   plugins: [vue()],
//   resolve: {
//     alias: {
//       '@': path.resolve(__dirname, 'resources/js'),
//     },
//   },
//   server: {
//     host: '127.0.0.1',
//     port: 5173,
//   },
// })
