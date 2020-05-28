<template>
    <div>
        <header class="mb-6 relative">
            <div class="relative">
                <img src="/images/default-profile-banner.jpg"
                     alt=""
                     class="mb-2"
                >

                <img src="http://127.0.0.1:8000/images/default-avatar.jpeg"
                     alt=""
                     class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                     style="left: 50%"
                     width="150"
                >
            </div>

            <div class="flex justify-between items-center mb-6">
                <div style="max-width: 270px">
                    <h2 class="font-bold text-2xl mb-0">{{ user.name }}</h2>
                    <p class="text-sm">Joined {{ user.created_at}}</p>
                </div>

                <div class="flex">
                    <a  :href="path + '/edit'" v-if="user.id === authUser.id"
                       class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                    >
                        Edit Profile
                    </a>
                    <a  :href="path + '/edit'"  @click.prevent="toggleFollow" v-else
                        class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                    >
                        <!--<span v-if="isFollowingData">Unfollow</span>-->
                        <!--<span v-else>Follow</span>-->
                        Follow
                    </a>

                </div>
            </div>

            <p class="text-sm">
                The name’s Bugs. Bugs Bunny. Don’t wear it out. Bugs is an anthropomorphic gray
                and white rabbit or hare who is famous for his flippant, insouciant personality.
                He is also characterized by a Brooklyn accent, his portrayal as a trickster,
                and his catch phrase "Eh...What's up, doc?"
            </p>


        </header>
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
