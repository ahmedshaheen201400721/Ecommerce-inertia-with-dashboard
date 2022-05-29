require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { Link } from '@inertiajs/inertia-vue3';
import layout from "@/Layouts/AppLayout.vue";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        let page=require(`./Pages/${name}.vue`).default
        if(page.layout===undefined) {
            page.layout=layout
        }
        return page
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .component('Link', Link)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
