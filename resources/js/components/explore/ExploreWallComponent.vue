<template>

        <ul>

            <li v-if="users && users.length > 0" v-for="user in users" class="mt-2">
                <div>
                    <a :href="'/profile/'+ user.userName" class="flex items-center text-sm">
                        <img src="http://127.0.0.1:8000/images/default-avatar.jpeg" alt="" class="rounded-full mr-2" width="40" height="40">
                        {{user.userName}}
                    </a>
                </div>
            </li>
            <li v-else>No friends yet!</li>
        </ul>
</template>

<script>
    export default {
        props: [
            'users',
        ],
        data(){

        },
        mounted() {

        },
    }
</script>
