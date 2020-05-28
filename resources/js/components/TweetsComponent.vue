<template>
    <div class="container">
         <div v-for="tweet in tweetsData">
             {{tweet.tweet}}
             {{tweet.user.name}}
         </div>
    </div>
</template>

<script>
    export default {
        props: [
           'tweets'
        ],
        data(){
            return{
                tweetsData: []
            }
        },
        mounted() {
            if(this.tweets){
                this.tweetsData = this.tweets;
            }
        }
    }
</script>
