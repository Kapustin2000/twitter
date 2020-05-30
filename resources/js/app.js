require('./bootstrap');

window.Vue = require('vue');

const axios = require('axios').default;

window.bus = new Vue();

Vue.component('explore-wall', require('./components/explore/ExploreWallComponent.vue').default);


Vue.component('tweets-wall', require('./components/tweets/TweetsWallComponent.vue').default);
Vue.component('tweet-create', require('./components/tweets/TweetCreateComponent.vue').default);
Vue.component('tweet', require('./components/tweets/TweetComponent.vue').default);


Vue.component('profile-show', require('./components/profile/ProfileShowComponent.vue').default);


Vue.component('friends-sidebar', require('./components/friends/FriendsSidebarComponent.vue').default);

 
const app = new Vue({
    el: '#app',
});
