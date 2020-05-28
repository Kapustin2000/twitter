<template>
    <div class="container">
        <form method="post" @submit.prevent="onFormSubmit">
            <input type="hidden" name="_token" :value="csrf">
            <input v-model="tweet" type="text" name="tweet" placeholder="New Tweet">
            <input type="submit" value="Submit">
        </form>
    </div>
</template>

<script>
    export default {
        props: [
           'route',
           'csrf'
        ],
        data(){
            return{
                tweetsData: [],
                tweet: null,
            }
        },
        mounted() {

        },
        methods: {
            onFormSubmit: function () {
                let vm = this;

                axios.post( vm.route , {
                        tweet: vm.tweet
                })
               .then(function (response) {
                   vm.tweet = null;
                   bus.$emit('new-tweet', response.data );
               })
               .catch(function (error) {
                   console.log(error);
               })
            }
        }
    }
</script>
