import { createRouter, createWebHistory } from 'vue-router';
import store from './store';

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
      meta: {
        requiresAuth: true
      }
    }
  ]
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.state.auth.user) {
    // User is not authenticated, redirect to login page
    next('/login')
  } else {
    // User is authenticated or route doesn't require authentication, allow access
    next()
  }
});


export default router