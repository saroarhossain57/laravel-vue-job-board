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
      meta: {
        onlyPublic: true,
      }
    },
    {
      path: '/register',
      component: Register,
      meta: {
        onlyPublic: true,
      }
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
  if (to.meta.requiresAuth && !store.state.auth.isLoggedIn) {
    // User is not authenticated, redirect to login page
    next('/login')
  } else if (to.meta.onlyPublic && store.state.auth.isLoggedIn) {
    // Redirect the user to dashboard because user is logged in
    next('/dashboard');
  } else {
    // User is authenticated or route doesn't require authentication, allow access
    next()
  }
});


export default router