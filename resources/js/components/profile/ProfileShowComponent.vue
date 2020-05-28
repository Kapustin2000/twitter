<template>
    <div class="container">
         {{user.name}}
         <button>
             <span v-if="isFollowingData">Unfollow</span>
             <span v-else>Follow</span>
         </button>
    </div>
</template>

<script>
    export default {
        props: [
           'user',
           'authUser',
           'isFollowing'
        ],
        data(){
            return {
                isFollowingData: false,
            };
        },
        mounted() {
            if(this.isFollowing){
                this.isFollowingData = this.isFollowing;
            }
        },
        methods: {

        }
    }
</script>
