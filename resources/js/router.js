import { createRouter, createWebHistory } from 'vue-router';

// components import
import Dashboard from './Pages/Dashboard/Dashboard.vue';
import Home from './Pages/Home.vue';
import Login from './Pages/Login.vue';
import Register from './Pages/Register.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      component: Home,
    },
    {
      path: '/login',
      component: Login,
    },
    {
      path: '/register',
      component: Register,
    },
    {
      path: '/dashboard',
      component: Dashboard,
    }
  ]
});



export default router