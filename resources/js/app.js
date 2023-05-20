import './bootstrap';
import {createApp} from 'vue'
import App from './App.vue'
import router from './router'
import store from './store';
import axios from 'axios';

const app = createApp(App);

const token = localStorage.getItem('token');
if(token){

  // Set the token in the axios authorization header
  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

  axios.get('/api/user')
  .then(response => {
    app.use(router)
    app.use(store)
    app.mount('#app')
    store.dispatch('auth/addAuthUser', response.data);
  }).catch(err => {
    console.error('Error fetching user data:', err);
  })
} else {

  app.use(router)
  app.use(store)
  app.mount('#app')
  
}