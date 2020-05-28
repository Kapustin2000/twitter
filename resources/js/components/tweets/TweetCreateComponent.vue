<template>
    <div class="container">
        <form method="post" :action="route">
            <input type="hidden" name="_token" :value="csrf">
            <input type="text" name="tweet" placeholder="New Tweet">
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
                tweetsData: []
            }
        },
        mounted() {

        }
    }
</script>
