<template>
    <div class="container">
         {{user.name}}
         <a :href="path + '/edit'" v-if="user.id === authUser.id">
             Edit
         </a>
        <button v-else @click="toggleFollow">
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
                path: window.location
            };
        },
        mounted() {
            if(this.isFollowing){
                this.isFollowingData = this.isFollowing;
            }
        },
        methods: {
            toggleFollow: function () {
                let vm = this;

                axios.post( vm.path +'/follow')
                        .then(function (response) {
                            vm.isFollowingData = !vm.isFollowingData;
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
            }
        }
    }
</script>
