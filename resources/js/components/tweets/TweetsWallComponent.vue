<template>
    <div class="container">
        <div>
            <div class="border border-gray-300 rounded-lg" v-for="tweet in tweetsData">
                <tweet :tweet="tweet" :user="user ? user : tweet.user"></tweet>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
           'tweets',
           'user'
        ],
        data(){
            return{
                tweetsData: [],
            }
        },
        mounted() {
            let vm = this;
            if(this.tweets){
                this.tweetsData = this.tweets;
            }
            bus.$on('new-tweet', function (tweet) {
                vm.tweetsData.unshift(tweet);
            });
        }
    }
</script>
