require('./bootstrap');

window.Vue = require('vue');

const axios = require('axios').default;

window.bus = new Vue();


Vue.component('tweets', require('./components/tweets/TweetsComponent.vue').default);
Vue.component('tweet-create', require('./components/tweets/TweetCreateComponent.vue').default);


Vue.component('profile-show', require('./components/profile/ProfileShowComponent.vue').default);


 
const app = new Vue({
    el: '#app',
});
