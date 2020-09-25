/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import router from './assets/router';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('todo-item', {
//     props: ['titulo', 'posts'],
//     template: '<li>This is a todo {{titulo}} {{posts.length}}</li>'
// });

//Vue.component('post-list', require('./components/PostListComponent.vue').default);
Vue.component('post-modal', require('./components/PostModalComponent.vue').default);
Vue.component('post-list-default', require('./components/PostListDefaultComponent.vue').default);


ClassicEditor
    .create(document.querySelector('#content'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

const app = new Vue({
    router,
    el: '#app',
    data: {
        titulo: 'Organic',
    },

});