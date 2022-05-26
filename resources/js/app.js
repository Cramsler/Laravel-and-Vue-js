require('./bootstrap');

import {createApp} from "vue";
import {createVuetify} from "vuetify";

import * as components from 'vuetify/components';
import * as locale from 'vuetify/locale';
import * as styles from 'vuetify/styles';
import * as directives from 'vuetify/directives';
const icons = require('@mdi/font/css/materialdesignicons.css')

import router from "./router";

import Index from "./components/Index";

const app = createApp({});

const vuetify = new createVuetify({
    components,
    locale,
    styles,
    icons,
    directives,
});

app.component('base-app', Index)

app.use(router);
app.use(vuetify);
app.mount('#app');
