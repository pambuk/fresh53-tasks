window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

Vue = require('vue');
require('vue-resource');
Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    request.headers.set('Authorization', 'Bearer ' + Laravel.apiToken);
    next();
});
