/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('menu-dashboard-principal', require('./components/MenuDashboardPrincipal').default);
Vue.component('contenido-general-dashboard', require('./components/ContenidoGeneralDashboard').default);
Vue.component('tab-general', require('./components/TabGeneral').default);
Vue.component('tab-operaciones', require('./components/TabOperaciones').default);
Vue.component('ver-listado', require('./components/VerListado').default);
Vue.component('form-operar', require('./components/FormOperar').default);
Vue.component('opt-operation', require('./components/OptOperation').default);

// GRAPHICS 
Vue.component('bar-graphic', require('./components/graphics/BarGraphic').default);
Vue.component('bar-double-graphic', require('./components/graphics/BarDoubleGraphic').default);
Vue.component('pie-lines-graphic', require('./components/graphics/PieLinesGraphic').default);
Vue.component('line-graphic', require('./components/graphics/LineGraphic').default);
Vue.component('horizontal-bars-graphic', require('./components/graphics/HorizontalBarsGraphic').default);
Vue.component('circle-pie-graphic', require('./components/graphics/CirclePieGraphic').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {

    }, 
    methods: {
        changeNav: function(val) {
            this.nav = val;
        }
    }
});
