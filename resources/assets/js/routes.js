import VueRouter from 'vue-router';

const example = require('./components/Example.vue');

let routes = [
    { path: '/',  component: example }
];

const router = new VueRouter({
    routes
});

export default router;