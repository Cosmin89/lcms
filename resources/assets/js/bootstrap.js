
window._ = require('lodash');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';


window.Vue = Vue;
Vue.use(VueRouter);

window.axios = axios;


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

