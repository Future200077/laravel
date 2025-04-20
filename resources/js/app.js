import './bootstrap';
import '../css/app.css'; 
// import { createApp } from 'vue';
// import ExampleComponent from './components/ExampleComponent.vue';

// createApp({
//     components: {
//         ExampleComponent
//     }
// }).mount('#app');


// import { createApp, h } from 'vue'
// import { createInertiaApp } from '@inertiajs/inertia-vue3'

// createInertiaApp({
// //   resolve: name => import(`./Pages/${name}.vue`),
//   resolve: name => import(`./Pages/Users/Profile.vue`),
//   setup({ el, App, props, plugin }) {
//     createApp({ render: () => h(App, props) })
//       .use(plugin)
//       .mount(el)
//   },
// })

// `./Dashboard.vue`, import.meta.glob('./Pages/**/*.vue')
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
// import { ZiggyVue } from 'ziggy'
// import { ZiggyVue } from 'ziggy/dist/vue';
// import { Ziggy } from './ziggy';
// import route from 'ziggy';
// import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m'

createInertiaApp({
  // resolve: (name) => resolvePageComponent(import.meta.glob('./Pages/**/*.vue')),
  // resolve: name => import(`./Pages/${name}.vue`),
  resolve: name => resolvePageComponent(
    `./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')
  ),
  
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      // .use(plugin,Ziggy)
      // .use(ZiggyVue, Ziggy)
      .use(plugin)
      .mount(el)
  },
});