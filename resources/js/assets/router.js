window.Vue = require('vue');

import VueRouter from 'vue-router';
import PostList from '../components/PostListComponent.vue';
import PostDetail from '../components/PostDetailComponent.vue';
import ProductList from '../components/ProductListComponent.vue';
import PostCategoryList from '../components/PostCategoryListComponent.vue';
import Contact from '../components/ContactComponent.vue';
import CategoryList from '../components/CategoryListComponent.vue';


// 1. Define route components.
// These can be imported from other files
// const Foo = { template: '<div>foo</div>' }
// const Bar = { template: '<div>bar</div>' }

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
    { path: '/', component: PostList, name: 'list' },
    { path: '/detail/:id', component: PostDetail, name: 'detail' },
    { path: '/post/:id/category', component: PostCategoryList, name: 'post.category' },
    { path: '/contact', component: Contact, name: 'contact' },
    { path: '/categories', component: CategoryList, name: 'categories' },
    //{ path: '/', component: ProductList },
]

Vue.use(VueRouter);

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
export default new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});