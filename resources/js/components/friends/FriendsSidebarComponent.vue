<template>
    <div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
        <h3 class="font-bold text-xl mb-4">Following</h3>

        <ul>

            <li v-if="followsData && followsData.length > 0" v-for="user in followsData" class="mt-2">
                <div>
                    <a :href="'/profile/'+ user.userName" class="flex items-center text-sm">
                        <img src="http://127.0.0.1:8000/images/default-avatar.jpeg" alt="" class="rounded-full mr-2" width="40" height="40">
                        {{user.userName}}
                    </a>
                </div>
            </li>
            <li v-else>No friends yet!</li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: [
            'follows',
        ],
        data(){
            return {
                followsData: false,
            };
        },
        mounted() {
            let vm = this;

            if(this.follows){
                this.followsData = this.follows;
            }

            bus.$on('follow', function (user) {
                vm.followsData.push(user);
            });

            bus.$on('unfollow', function (user) {
                vm.followsData = vm.followsData.filter(following => following.id !== user.id);
            });
        },
    }
</script>
