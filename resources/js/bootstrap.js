window._ = require('lodash');
// import MyStorage from './Helpers/MyStorage';
import { store } from './_store';
/**
 *
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
// const axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const JWTtoken = `Bearer ${store.state.users.token}`;
window.axios.defaults.headers.common['Authorization'] = JWTtoken;


// axios.defaults.baseURL = 'http://localhost:8000/'
// axios.defaults.headers.common = {'Authorization': `Bearer ${store.state.token}`}
// export default axios;

axios.interceptors.response.use((response) =>{


    return response;
}, (error) => {
    console.log('bootstrap');
       if (error.response.status == 401) {


           // store.dispatch('performLogoutAction');
           // router.push('/');
           console.log('sss');

       }

       return Promise.reject(error);
   });


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
