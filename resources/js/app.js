// import './bootstrap';
// import '../css/app.css';

// import { createApp, h } from 'vue';
// import { createInertiaApp } from '@inertiajs/inertia-vue3';
// import { InertiaProgress } from '@inertiajs/progress';
//import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
// import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

// const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
//     setup({ el, app, props, plugin }) {
//         return createApp({ render: () => h(app, props) })
//             .use(plugin)
//             .use(ZiggyVue, Ziggy)
//             .mount(el);
//     },
// });

// InertiaProgress.init({ color: '#4B5563' });
import { createApp, h } from "vue";

import {
    App as InertiaApp,
    plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue3";
import { InertiaProgress } from '@inertiajs/progress';

import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import '../css/app.css';

const app = document.getElementById("app");

const pages = import.meta.glob("./Pages/**/*.vue");


createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: async (name) => {
                const importPage = pages[`./Pages/${name}.vue`];
                if (!importPage) {
                    throw new Error(
                        `Unknown page ${name}. Is it located under Pages with a .vue extension?`
                    );
                }
                const module = await importPage();
                const page = module.default;

                //   page.layout = page.layout || Default;
                return page;
            },

        }),
})
    .use(InertiaPlugin)
    .use(ZiggyVue, Ziggy)
    .mount(app);

InertiaProgress.init({ color: '#4B5563' });
