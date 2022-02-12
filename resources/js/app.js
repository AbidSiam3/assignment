import Vue from "vue";

require('./bootstrap');
window.Vue = require('vue');
import index_component from './IndexComponent'
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios)

const app = new Vue({
    el: '#app',
    components: {
        "index-component": index_component
    }
});
