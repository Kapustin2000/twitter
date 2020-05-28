<template>
    <div class="container">
         <div v-for="tweet in tweetsData">
             {{tweet.body}}
             <p v-if="!profile">{{tweet.user.name}}</p>
             <p>{{tweet.name}}</p>
         </div>
    </div>
</template>

<script>
    export default {
        props: [
           'tweets',
           'profile'
        ],
        data(){
            return{
                tweetsData: []
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
