import { createRouter, createWebHistory } from 'vue-router';

// components import
import Dashboard from './Pages/Dashboard/Dashboard.vue';
import Home from './Pages/Home.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      component: Home,
    },
    {
      path: '/dashboard',
      component: Dashboard,
    }
  ]
});



export default router